<?php

namespace Passage\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\HttpFactory;
use Firebase\JWT\JWT;
use Firebase\JWT\CachedKeySet;
use OpenAPI\Client\ApiException;
use Phpfastcache\CacheManager;
use InvalidArgumentException;
use UnexpectedValueException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\Api\MagicLinksApi;
use OpenAPI\Client\Model\CreateMagicLinkRequest;
use OpenAPI\Client\Model\MagicLink;
use OpenAPI\Client\Model\MagicLinkChannel;

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
            60 * 60 * 24, // expires in 24 hours
            true
        );
    }

    /**
     * Validate that a JWT is valid and return the Passage user ID associated with the token.
     *
     * @param string $jwt The authentication token to be validated
     *
     * @return string User ID of the Passage user
     * @throws InvalidArgumentException Invalid parameter value or JWT format is invalid
     * @throws UnexpectedValueException Could not retrieve sub claim from token
     */
    public function validateJwt(string $jwt): string
    {
        if (!$jwt) {
            throw new InvalidArgumentException('JWT is required');
        }

        $decodedToken = JWT::decode($jwt, $this->jwks);

        if (!in_array($this->appId, $decodedToken->aud)) {
            throw new UnexpectedValueException('JWT audience does not match');
        }

        $userId = $decodedToken->sub;

        if (!$userId) {
            throw new UnexpectedValueException('Could not retrieve sub claim from token');
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
     * @throws PassageError
     */
    public function createMagicLink(
        MagicLinkWithEmailArgs|MagicLinkWithPhoneArgs|MagicLinkWithUserArgs $args,
        MagicLinkOptions|null $options,
    ): MagicLink {
        $identifier = null;
        $channel = null;

        switch ($args) {
            case $args instanceof MagicLinkWithEmailArgs:
                $identifier = $args->email;
                $channel = MagicLinkChannel::EMAIL;
                break;
            case $args instanceof MagicLinkWithPhoneArgs:
                $identifier = $args->phone;
                $channel = MagicLinkChannel::PHONE;
                break;
            case $args instanceof MagicLinkWithUserArgs:
                $identifier = $args->userId;
                $channel = $args->channel;
                break;
            default:
                throw new InvalidArgumentException("args must contain an email, phone, or userId");
        }

        $payload = new CreateMagicLinkRequest(
            [
                'identifier' => $identifier,
                'channel' => $channel,
                'type' => $args->type,
                'send' => $args->send,
            ]
        );

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

        try {
            return $magicLinksApi->createMagicLink($this->appId, $payload)->getMagicLink();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }
}
