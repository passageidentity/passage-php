<?php

namespace Passage\Client;

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
        $clientConfig = new Configuration();
        $clientConfig->setAccessToken($apiKey);

        $this->auth = new Auth($appId, $clientConfig);
        $this->user = new User($appId, $clientConfig);
    }
}
