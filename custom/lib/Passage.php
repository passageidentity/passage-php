<?php

namespace Passage\Client;

use OpenAPI\Client\Configuration;
use OpenAPI\Client\Api\AppsApi;
use OpenAPI\Client\Api\MagicLinksApi;
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
use OpenAPI\Client\ApiException;

class Passage
{
    public Auth $auth;
    public User $user;
    private string $appId;
    private Configuration $clientConfiguration;

    /**
     * Initialize a new Passage instance.
     *
     * @param string $appId  Passage app id (required)
     * @param string $apiKey Passage api key (required)
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(string $appId, string $apiKey)
    {
        $this->appId = $appId;
        $this->clientConfiguration = new Configuration();
        $this->clientConfiguration->setAccessToken($apiKey);

        $this->auth = new Auth($appId, $this->clientConfiguration);
        $this->user = new User($appId, $this->clientConfiguration);
    }

    /**
     * @deprecated 1.0.0 Will not be replaced.
     *
     * Get AppId key for this Passage instance
     *
     * @return string|null Passage API Key
     */
    public function getAppId(): string
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->appId;
    }

    /**
     * @deprecated 1.0.0 Will not be replaced.
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return AppInfo|Model401Error|Model404Error|Model500Error
     */
    public function getApp(): AppInfo
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $appsApi = new AppsApi();
        return $appsApi->getApp($this->appId)['app'];
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->auth->createMagicLink
     *
     * Create a Magic Link for your app.
     *
     * @param CreateMagicLinkRequest $create_magic_link_request Args for creating a Magic Link
     * @return MagicLink|Model401Error|Model404Error|Model500Error MagicLink object
     */
    public function createMagicLink(
        CreateMagicLinkRequest $create_magic_link_request
    ): MagicLink|Model401Error|Model404Error|Model500Error {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $magicLinksApi = new MagicLinksApi(null, $this->clientConfiguration);
        return $magicLinksApi->createMagicLink($this->appId, $create_magic_link_request)['magic_link'];
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->revokeRefreshTokens
     *
     * Revokes all of a user's Refresh Tokens using their User ID.
     *
     * @param string $user_id The Passage user ID
     * @return null|Model401Error|Model404Error|Model500Error
     */
    public function revokeUserRefreshTokens(string $user_id): null|array|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $this->user->revokeRefreshTokens($user_id);
        return null;
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->revokeDevice
     *
     * Revoke a user's device using their user ID and the device ID.
     *
     * @param string $user_id The Passage user ID
     * @param string $device_id The Passage user's device ID
     * @return null|Model401Error|Model404Error|Model500Error
     */
    public function deleteUserDevice(string $user_id, string $device_id): null|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $this->user->revokeDevice($user_id, $device_id);
        return null;
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->listDevices
     *
     * Get a user's devices using their user ID.
     *
     * @param string $user_id The Passage user ID
     * @return WebAuthnDevices[]|Model401Error|Model404Error|Model500Error List of devices
     */
    public function listUserDevices(string $user_id): array|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->user->listDevices($user_id);
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->get
     *
     * Get a user's object using their user ID.
     *
     * @param string $user_id The Passage user ID
     * @return UserInfo|Model401Error|Model404Error|Model500Error Passage User object
     */
    public function getUser(string $user_id): UserInfo|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->user->get($user_id);
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->getByIdentifier
     *
     * Get a user's object using their user identifier.
     *
     * @param string $identifier The Passage user email or phone number
     * @return UserInfo|Model401Error|Model404Error|Model500Error Passage User object
     * @throws ApiException If the user is not found
     */
    public function getUserByIdentifier(string $identifier): UserInfo|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        try {
            return $this->user->getByIdentifier($identifier);
        } catch (ApiException $e) {
            throw new ApiException(
                "Could not find user with that identifier.",
                404,
                null,
                null
            );
        }
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->activate
     *
     * Activate a user using their user ID.
     *
     * @param string $user_id The Passage user ID
     * @return UserInfo|Model401Error|Model404Error|Model500Error Passage User object
     */
    public function activateUser(string $user_id): UserInfo|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->user->activate($user_id);
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->create
     *
     * Create a user
     *
     * @param CreateUserRequest $create_user_request Arguments for creating a user
     * @return UserInfo|Model401Error|Model404Error|Model500Error Passage User object
     */
    public function createUser(
        CreateUserRequest $create_user_request
    ): UserInfo|Model401Error|Model404Error|Model500Error {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->user->create($create_user_request);
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->deactivate
     *
     * Deactivate a user using their user ID.
     *
     * @param string $user_id The Passage user ID
     * @return UserInfo|Model401Error|Model404Error|Model500Error Passage User object
     */
    public function deactivateUser(string $user_id): UserInfo|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->user->deactivate($user_id);
    }

    /**
     * Delete a user using their user ID.
     *
     * @param string $user_id The Passage user ID used to delete the corresponding user.
     * @return null|Model401Error|Model404Error|Model500Error
     */
    public function deleteUser(string $user_id): null|Model401Error|Model404Error|Model500Error
    {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $this->user->delete($user_id);
        return null;
    }

    /**
     * @deprecated 1.0.0
     * @see Passage->user->update
     *
     * Update a user.
     *
     * @param string $user_id The Passage user ID
     * @param UpdateUserRequest $update_user_request The updated user information
     * @return UserInfo|Model401Error|Model404Error|Model500Error Passage User Object
     */
    public function updateUser(
        string $user_id,
        UpdateUserRequest $update_user_request
    ): UserInfo|Model401Error|Model404Error|Model500Error {
        trigger_error('Method ' . __METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        return $this->user->update($user_id, $update_user_request);
    }
}
