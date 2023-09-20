<?php

namespace Passage\Client\Api;

class PassageApi {
    private string $app_id;
    private string $api_key;

    /**
     * Initialize a new Passage instance.
     * @param app_id $app_id Passage app id (required)
     * @param api_key $api_key Passage api key (required)
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct(string $app_id, string $api_key) {
        $this->app_id = $app_id;
        $this->api_key = $api_key;
    }

    /**
     * Get AppId key for this Passage instance
     * @return string|null Passage API Key
     */
    public function getAppId(): string {
        return $this->app_id;
    }

}
?>
