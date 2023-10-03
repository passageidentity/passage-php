<?php

namespace Passage\Client\Controllers;

class Passage {
    private string $appId;
    private string $apiKey;
    public string $authStrategy;

    /**
     * Initialize a new Passage instance.
     * @param appId $appId Passage app id (required)
     * @param apiKey $apiKey Passage api key (required)
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct(string $appId, string $apiKey, string $authStrategy = 'COOKIE') {
        $this->authStrategy = $authStrategy;
        
        $this->appId = $appId;
        $this->apiKey = $apiKey;
    }

    /**
     * Get AppId key for this Passage instance
     * @return string|null Passage API Key
     */
    public function getAppId(): string {
        return $this->appId;
    }

}
?>
