<?php

namespace Passage\Client;

use OpenAPI\Client\Api\TokensApi;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\Api\UsersApi;
use OpenAPI\Client\Api\UserDevicesApi;
use OpenAPI\Client\Model\UserInfo as PassageUser;
use OpenAPI\Client\Model\UpdateUserRequest as UpdateUserArgs;
use OpenAPI\Client\Model\CreateUserRequest as CreateUserArgs;
use OpenAPI\Client\Model\WebAuthnDevices;
use OpenAPI\Client\ApiException;

class User
{
    private readonly UsersApi $usersApi;
    private readonly UserDevicesApi $userDevicesApi;
    private readonly TokensApi $tokensApi;

    /**
     * User class for handling operations to get and update user information.
     */
    public function __construct(private string $appId, Configuration $config)
    {
        $this->appId = $appId;
        $this->usersApi = new UsersApi(null, $config);
        $this->userDevicesApi = new UserDevicesApi(null, $config);
        $this->tokensApi = new TokensApi(null, $config);
    }

    /**
     * Get a user's object using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return PassageUser Passage User object
     */
    public function get(string $userId): PassageUser
    {
        return $this->usersApi->getUser($this->appId, $userId)->getUser();
    }

    /**
     * Get a user's object using their user identifier.
     *
     * @param string $identifier The Passage user email or phone number
     * @return PassageUser Passage User object
     * @throws ApiException
     */
    public function getByIdentifier(string $identifier): PassageUser
    {
        $users = $this->usersApi->listPaginatedUsers(
            $this->appId,
            limit: 1,
            identifier: strtolower($identifier)
        )->getUsers();

        if (count($users) === 0) {
            throw new ApiException(
                "[404] Could not find user with that identifier.",
                404,
                null,
                null
            );
        }

        $userId = $users[0]->getId();
        return $this->usersApi->getUser($this->appId, $userId)->getUser();
    }

    /**
     * Activate a user using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return PassageUser Passage User object
     */
    public function activate(string $userId): PassageUser
    {
        return $this->usersApi->activateUser($this->appId, $userId)->getUser();
    }

    /**
     * Deactivate a user using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return PassageUser Passage User object
     */
    public function deactivate(string $userId): PassageUser
    {
        return $this->usersApi->deactivateUser($this->appId, $userId)->getUser();
    }

    /**
     * Update a user.
     *
     * @param string $userId The Passage user ID
     * @param UpdateUserArgs $args The updated user information
     * @return PassageUser Passage User Object
     */
    public function update(string $userId, UpdateUserArgs $args): PassageUser
    {
        return $this->usersApi->updateUser($this->appId, $userId, $args)->getUser();
    }

    /**
     * Create a user.
     *
     * @param CreateUserArgs $args Arguments for creating a user
     * @return PassageUser Passage User object
     */
    public function create(CreateUserArgs $args): PassageUser
    {
        return $this->usersApi->createUser($this->appId, $args)->getUser();
    }

    /**
     * Delete a user using their user ID.
     *
     * @param string $userId The Passage user ID used to delete the corresponding user.
     * @return void
     */
    public function delete(string $userId): void
    {
        $this->usersApi->deleteUser($this->appId, $userId);
    }

    /**
     * Get a user's devices using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return WebAuthnDevices[] List of devices
     */
    public function listDevices(string $userId): array
    {
        return $this->userDevicesApi->listUserDevices($this->appId, $userId)->getDevices();
    }

    /**
     * Revoke a user's device using their user ID and the device ID.
     *
     * @param string $userId The Passage user ID
     * @param string $deviceId The Passage user's device ID
     * @return void
     */
    public function revokeDevice(string $userId, string $deviceId): void
    {
        $this->userDevicesApi->deleteUserDevices($this->appId, $userId, $deviceId);
    }

    /**
     * Revokes all of a user's Refresh Tokens using their User ID.
     *
     * @param string $userId The Passage user ID
     * @return void
     */
    public function revokeRefreshTokens(string $userId): void
    {
        $this->tokensApi->revokeUserRefreshTokens($this->appId, $userId);
    }
}
