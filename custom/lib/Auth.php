<?php

namespace Passage\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Firebase\JWT\JWT;
use Firebase\JWT\CachedKeySet;
use Phpfastcache\CacheManager;
use InvalidArgumentException;
use UnexpectedValueException;
use OpenAPI\Client\Configuration;

class Auth
{
    private CachedKeySet $jwks;

    /**
     * Auth class that provides methods for validating JWTs and creating Magic Links.
     */
    public function __construct(private string $appId, private Configuration $config)
    {
        $this->appId = $appId;
        $this->config = $config;

        $httpClient = new Client();
        $httpFactory = new HttpFactory();

        $cacheItemPool = CacheManager::getInstance('files');
        $this->jwks = new CachedKeySet(
            "https://auth.passage.id/v1/apps/{$appId}/.well-known/jwks.json",
            $httpClient,
            $httpFactory,
            $cacheItemPool,
            null,
            true
        );
    }

    /**
     * Validate that a JWT is valid and return the Passage user ID associated with the token.
     *
     * @param string $jwt The authentication token to be validated
     *
     * @return string User ID of the Passage user
     * @throws InvalidArgumentException JWT format is invalid
     */
    public function validateJwt(string $jwt): string
    {
        $jwtSegments = explode('.', $jwt);
        if (count($jwtSegments) !== 3) {
            throw new InvalidArgumentException('Invalid JWT format');
        }

        $decodedHeader = JWT::urlsafeB64Decode($jwtSegments[0]);
        $header = json_decode($decodedHeader);

        if (!$header->kid) {
            throw new InvalidArgumentException('Missing kid in token');
        }

        $decodedToken = JWT::decode($jwt, $this->jwks);
        $userId = $decodedToken->sub;

        if (!$userId) {
            throw new UnexpectedValueException('Could not retrieve user id');
        }

        return strval($userId);
    }
}
