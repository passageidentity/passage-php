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
use OpenAPI\Client\Api\MagicLinksApi;
use OpenAPI\Client\Model\CreateMagicLinkRequest;
use OpenAPI\Client\Model\MagicLink;

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

    /**
     * Create a Magic Link for your app.
     *
     * @param MagicLinkWithEmailArgs|MagicLinkWithPhoneArgs|MagicLinkWithUserArgs $args
     * Required args for creating a MagicLink
     * @param MagicLinkOptions|null $options Optional options for creating a MagicLink
     * @return MagicLink Passage MagicLink object
     * @throws InvalidArgumentException Args must contain an email, phone, or userId
     */
    public function createMagicLink(
        MagicLinkWithEmailArgs|MagicLinkWithPhoneArgs|MagicLinkWithUserArgs $args,
        MagicLinkOptions|null $options,
    ): MagicLink {
        $payload = new CreateMagicLinkRequest();
        $payload->setType($args->type);
        $payload->setSend($args->send);

        switch ($args) {
            case $args instanceof MagicLinkWithEmailArgs:
                $payload->setEmail($args->email);
                break;
            case $args instanceof MagicLinkWithPhoneArgs:
                $payload->setPhone($args->phone);
                break;
            case $args instanceof MagicLinkWithUserArgs:
                $payload->setUserId($args->userId);
                break;
            default:
                throw new InvalidArgumentException("args must contain an email, phone, or userId");
        }

        if ($options) {
            if ($options->language) {
                $payload->setLanguage($options->language);
            }
            if ($options->magicLinkPath) {
                $payload->setMagicLinkPath($options->magicLinkPath);
            }
            if ($options->redirectUrl) {
                $payload->setRedirectUrl($options->redirectUrl);
            }
            if ($options->ttl) {
                $payload->setTtl($options->ttl);
            }
        }

        $magicLinksApi = new MagicLinksApi(null, $this->config);
        return $magicLinksApi->createMagicLink($this->appId, $payload)->getMagicLink();
    }
}
