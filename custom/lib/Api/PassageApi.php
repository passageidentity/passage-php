<?php

namespace Passage\Client\Api;

class PassageApi {
    public $app_id;
    private $api_key;

    /**
     * Initialize a new Passage instance.
     * @param array $config The default config for Passage initialization (required)
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct($config = []) {
        if (!isset($config['app_id'])) {
            throw new \InvalidArgumentException(
                'A Passage app_id is required. Please include [app_id => YOUR_APP_ID].'
            );
        }
        $this->app_id = $config['app_id'];
        $this->api_key = isset($config['api_key']) ? $config['api_key'] : null;
    }

    /**
     * Get AppId key for this Passage instance
     * @return string|null Passage API Key
     */
    public function getAppId() {
        return $this->app_id;
    }

}
?>
