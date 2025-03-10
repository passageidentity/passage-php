<?php

namespace Passage\Client;

use InvalidArgumentException;
use OpenAPI\Client\Api\TokensApi;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\Api\UsersApi;
use OpenAPI\Client\Api\UserDevicesApi;
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
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function get(string $userId): PassageUser
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            return $this->usersApi->getUser($this->appId, $userId)->getUser();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Get a user's object using their user identifier.
     *
     * @param string $identifier The Passage user email or phone number
     * @return PassageUser Passage User object
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function getByIdentifier(string $identifier): PassageUser
    {
        if (!$identifier) {
            throw new InvalidArgumentException('identifier is required');
        }

        try {
            $users = $this->usersApi->listPaginatedUsers(
                $this->appId,
                limit: 1,
                identifier: strtolower($identifier)
            )->getUsers();

            if (count($users) === 0) {
                throw PassageError::fromApiException(
                    new ApiException(
                        "",
                        404,
                        null,
                        "{\"code\":\"user_not_found\",\"error\":\"User not found.\"}",
                    ),
                );
            }

            $userId = $users[0]->getId();
            return $this->usersApi->getUser($this->appId, $userId)->getUser();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Activate a user using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return PassageUser Passage User object
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function activate(string $userId): PassageUser
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            return $this->usersApi->activateUser($this->appId, $userId)->getUser();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Deactivate a user using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return PassageUser Passage User object
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function deactivate(string $userId): PassageUser
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            return $this->usersApi->deactivateUser($this->appId, $userId)->getUser();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Update a user.
     *
     * @param string $userId The Passage user ID
     * @param UpdateUserArgs $options The updated user information
     * @return PassageUser Passage User Object
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function update(string $userId, UpdateUserArgs $options): PassageUser
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            return $this->usersApi->updateUser($this->appId, $userId, $options)->getUser();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Create a user.
     *
     * @param CreateUserArgs $args Arguments for creating a user
     * @return PassageUser Passage User object
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function create(CreateUserArgs $args): PassageUser
    {
        if (!$args->getEmail() && !$args->getPhone()) {
            throw new InvalidArgumentException('At least one of args->email or args->phone is required.');
        }

        try {
            return $this->usersApi->createUser($this->appId, $args)->getUser();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Delete a user using their user ID.
     *
     * @param string $userId The Passage user ID used to delete the corresponding user.
     * @return void
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function delete(string $userId): void
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            $this->usersApi->deleteUser($this->appId, $userId);
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Get a user's devices using their user ID.
     *
     * @param string $userId The Passage user ID
     * @return WebAuthnDevices[] List of devices
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function listDevices(string $userId): array
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            return $this->userDevicesApi->listUserDevices($this->appId, $userId)->getDevices();
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Revoke a user's device using their user ID and the device ID.
     *
     * @param string $userId The Passage user ID
     * @param string $deviceId The Passage user's device ID
     * @return void
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function revokeDevice(string $userId, string $deviceId): void
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        if (!$deviceId) {
            throw new InvalidArgumentException('deviceId is required');
        }

        try {
            $this->userDevicesApi->deleteUserDevices($this->appId, $userId, $deviceId);
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }

    /**
     * Revokes all of a user's Refresh Tokens using their User ID.
     *
     * @param string $userId The Passage user ID
     * @return void
     * @throws InvalidArgumentException Invalid parameter value
     * @throws PassageError
     */
    public function revokeRefreshTokens(string $userId): void
    {
        if (!$userId) {
            throw new InvalidArgumentException('userId is required');
        }

        try {
            $this->tokensApi->revokeUserRefreshTokens($this->appId, $userId);
        } catch (ApiException $e) {
            throw PassageError::fromApiException($e);
        }
    }
}
