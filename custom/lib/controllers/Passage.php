<?php

namespace Passage\Client\Controllers;

use OpenAPI\Client\Api\AppsApi;
use OpenAPI\Client\Api\MagicLinksApi;
use OpenAPI\Client\Api\TokensApi;
use OpenAPI\Client\Api\UsersApi;
use OpenAPI\Client\Api\UserDevicesApi;

use OpenAPI\Client\Model\AppResponse;
use \OpenAPI\Client\Model\ListDevicesResponse;
use OpenAPI\Client\Model\MagicLinkResponse;
use \OpenAPI\Client\Model\UserResponse;

class Passage {
    private string $appId;
    private string $apiKey;

    /**
     * Initialize a new Passage instance.
     * @param appId $appId Passage app id (required)
     * @param apiKey $apiKey Passage api key (required)
     * 
     * @throws \InvalidArgumentException
     */
    public function __construct(string $appId, string $apiKey) {
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

    /**
     * Get AppId key for this Passage instance
     * @return AppResponse Passage App
     */
    public function getApp() {
        return UsersApi::getApp($this->app_id);
    }

    /**
     * Get App for this Passage instance
     * @return MagicLinkResponse Passage API Key
     */
    public function createMagicLink($create_magic_link_request) {
        return MagicLinksApi::createMagicLink($this->app_id, $create_magic_link_request);
    }

    /**
     * Revoke user token for the user
     * @return null
     */
    public function revokeUserRefreshTokens($user_id) {
        return TokensApi::revokeUserRefreshTokens($this->app_id, $user_id);
    }

    /**
     * Delete the device for a user
     * @return null
     */
    public function deleteUserDevice($user_id, $device_id) {
        return UserDevicesApi::deleteUserDevices($this->app_id, $user_id, $device_id);
    }

    /**
     * List the devices for a user
     * @return ListDevicesResponse
     */
    public function listUserDevices($user_id) {
        return UserDevicesApi::listUserDevices($this->app_id, $user_id);
    }

    /**
     * Activate a user
     * @return UserResponse
     */
    public function activateUser($user_id) {
        return UsersApi::activateUser($this->app_id, $user_id);
    }

    /**
     * Create a user
     * @return UserResponse
     */
    public function createUser($create_user_request) {
        return UsersApi::createUser($this->app_id, $create_user_request);
    }

    /**
     * Deactivate a user
     * @return UserResponse
     */
    public function deactivateUser($user_id) {
        return UsersApi::deactivateUser($this->app_id, $user_id);
    }

    /**
     * Delete a user
     * @return null
     */
    public function deleteUser($user_id) {
        return UsersApi::deleteUser($this->app_id, $user_id);
    }

    /**
     * Update a user
     * @return UserResponse
     */
    public function updateUser($user_id, $update_user_request) {
        return UsersApi::updateUser($this->app_id, $user_id, $update_user_request);
    }
}
?>
