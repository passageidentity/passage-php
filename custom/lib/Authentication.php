<?php

namespace Passage\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use GuzzleHttp\Psr7\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\CachedKeySet;
use Phpfastcache\CacheManager;
use OpenAPI\Client\ApiException;

class Authentication
{
    private $passage;
    private $jwks;

    /**
     * Initialize a new Passage instance.
     *
     * @param Passage $passage
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(Passage $passage)
    {
        $this->passage = $passage;

        $appId = $this->passage->getAppId();
        $jwtIssuer = 'https://auth.passage.id/v1/apps/' . $appId . '/.well-known/jwks.json';

        $this->jwks = $this->fetchJWKS($jwtIssuer);
    }

    /**
     * Returns the JWKS for the current app
     *
     * @param string $url
     *
     * @return CachedKeySet UserId of the Passage user
     */
    private function fetchJWKS(string $url): CachedKeySet
    {
        $httpClient = new Client();
        $httpFactory = new HttpFactory();

        $cacheItemPool = CacheManager::getInstance('files');

        $keySet = new CachedKeySet(
            $url,
            $httpClient,
            $httpFactory,
            $cacheItemPool,
            null,
            true
        );

        return $keySet;
    }

    /**
     * Determine if the provided token is valid when compared with its
     * respective public key.
     *
     * @param string $jwtString Authentication token
     *
     * @return string sub claim if the jwt can be verified, or Error
     */
    public function validateJWT(string $jwtString): string | null
    {
        try {
            $decodedHeader = JWT::urlsafeB64Decode(explode('.', $jwtString)[0]);
            $header = json_decode($decodedHeader);

            $kid = $header->kid;

            if (!$kid) {
                throw new ApiException(
                    'Could not verify token: Missing kid in token',
                    401
                );
            }

            $decodedToken = JWT::decode($jwtString, $this->jwks);
            $userID = $decodedToken->sub;

            if ($userID) {
                return strval($userID);
            } else {
                throw new ApiException(
                    'Could not verify token: Could not retrieve user id',
                    401
                );
            }
        } catch (\Exception $e) {
            throw new ApiException(
                'Could not verify token: ' . $e->getMessage(),
                401
            );
        }
    }
}
