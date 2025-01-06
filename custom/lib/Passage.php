<?php

namespace Passage\Client;

use InvalidArgumentException;
use OpenAPI\Client\Configuration;

class Passage
{
    public Auth $auth;
    public User $user;

    /**
     * Initialize a new Passage instance.
     *
     * @param string $appId  Passage app id (required)
     * @param string $apiKey Passage api key (required)
     */
    public function __construct(string $appId, string $apiKey)
    {
        if (!$appId) {
            throw new InvalidArgumentException(
                'A Passage App ID is required. Please include (YOUR_APP_ID, YOUR_API_KEY).'
            );
        }

        if (!$apiKey) {
            throw new InvalidArgumentException(
                'A Passage API key is required. Please include (YOUR_APP_ID, YOUR_API_KEY).'
            );
        }

        $clientConfig = new Configuration();
        $clientConfig->setAccessToken($apiKey);

        $this->auth = new Auth($appId, $clientConfig);
        $this->user = new User($appId, $clientConfig);
    }
}
