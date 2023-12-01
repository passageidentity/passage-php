<?php

namespace Passage\Client;

use OpenAPI\Client\Configuration;

use OpenAPI\Client\Api\AppsApi;
use OpenAPI\Client\Api\MagicLinksApi;
use OpenAPI\Client\Api\TokensApi;
use OpenAPI\Client\Api\UsersApi;
use OpenAPI\Client\Api\UserDevicesApi;

use OpenAPI\Client\Model\AppInfo;
use OpenAPI\Client\Model\CreateMagicLinkRequest;
use OpenAPI\Client\Model\CreateUserRequest;
use OpenAPI\Client\Model\MagicLink;
use OpenAPI\Client\Model\Model401Error;
use OpenAPI\Client\Model\Model404Error;
use OpenAPI\Client\Model\Model500Error;
use OpenAPI\Client\Model\UserInfo;
use OpenAPI\Client\Model\UpdateUserRequest;
use OpenAPI\Client\Model\WebAuthnDevices;

class Passage {
    private string $appId;
    private string $apiKey;
    private Configuration $clientConfiguration;
    private UsersApi $usersApi;
    private UserDevicesApi $userDevicesApi;

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
        $this->clientConfiguration = new Configuration();
        $this->clientConfiguration->setAccessToken($apiKey);

        $this->usersApi = new UsersApi(null, $this->clientConfiguration);
        $this->userDevicesApi = new UserDevicesApi(null, $this->clientConfiguration);
    }

    /**
     * Get AppId key for this Passage instance
     * @return string|null Passage API Key
     */
    public function getAppId(): string {
        return $this->appId;
    }

    /**
     * @param  string $app_id App ID (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['getApp'] to see the possible values for this operation
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return AppInfo|Model401Error|Model404Error|Model500Error
     */
    public function getApp(): AppInfo {
        $appsApi = new AppsApi();
        return $appsApi->getApp($this->appId)['app'];
    }

    /**
     * Get App for this Passage instance
     * @return MagicLink|Model401Error|Model404Error|Model500Error MagicLink object
     */
    public function createMagicLink(CreateMagicLinkRequest $create_magic_link_request): MagicLink|Model401Error|Model404Error|Model500Error {
        $magicLinksApi = new MagicLinksApi(null, $this->clientConfiguration);
        return $magicLinksApi->createMagicLink($this->appId, $create_magic_link_request)['magic_link'];
    }

    /**
     * Revoke user token for the user
     * @return null|Model401Error|Model404Error|Model500Error
     */
    public function revokeUserRefreshTokens(string $user_id): null|array|Model401Error|Model404Error|Model500Error {
        return TokensApi::revokeUserRefreshTokens($this->appId, $user_id);
    }

    /**
     * Delete the device for a user
     * @return null|Model401Error|Model404Error|Model500Error
     */
    public function deleteUserDevice(string $user_id, string $device_id): null|Model401Error|Model404Error|Model500Error {
        return UserDevicesApi::deleteUserDevices($this->appId, $user_id, $device_id);
    }

    /**
     * List the devices for a user
     * @return array|Model401Error|Model404Error|Model500Error
     */
    public function listUserDevices(string $user_id): array|Model401Error|Model404Error|Model500Error {
        return $this->userDevicesApi->listUserDevices($this->appId, $user_id)['devices'];
    }

    /**
     * Get a user
     * @return UserInfo|Model401Error|Model404Error|Model500Error
     */
    public function getUser(string $user_id): UserInfo|Model401Error|Model404Error|Model500Error {
        return $this->usersApi->getUser($this->appId, $user_id)['user'];
    }

    /**
     * Activate a user
     * @return UserInfo|Model401Error|Model404Error|Model500Error
     */
    public function activateUser(string $user_id): UserInfo|Model401Error|Model404Error|Model500Error {
        return $this->usersApi->activateUser($this->appId, $user_id)['user'];
    }

    /**
     * Create a user
     * @return UserInfo|Model401Error|Model404Error|Model500Error
     */
    public function createUser(CreateUserRequest $create_user_request): UserInfo|Model401Error|Model404Error|Model500Error {
        return $this->usersApi->createUser($this->appId, $create_user_request)['user'];
    }

    /**
     * Deactivate a user
     * @return UserInfo|Model401Error|Model404Error|Model500Error
     */
    public function deactivateUser(string $user_id): UserInfo|Model401Error|Model404Error|Model500Error {
        return $this->usersApi->deactivateUser($this->appId, $user_id)['user'];
    }

    /**
     * Delete a user
     * @return null|Model401Error|Model404Error|Model500Error
     */
    public function deleteUser(string $user_id): null|Model401Error|Model404Error|Model500Error {
        return $this->usersApi->deleteUser($this->appId, $user_id);
    }

    /**
     * Update a user
     * @return UserInfo|Model401Error|Model404Error|Model500Error
     */
    public function updateUser(string $user_id, UpdateUserRequest $update_user_request): UserInfo|Model401Error|Model404Error|Model500Error {
        return $this->usersApi->updateUser($this->appId, $user_id, $update_user_request)['user'];
    }
}
?>
