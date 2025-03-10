<?php
/**
 * PassageUser
 *
 * PHP version 8.1
 *
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Passage Management API
 *
 * Passage's management API to manage your Passage apps and users.
 *
 * The version of the OpenAPI document: 1
 * Contact: support@passage.id
 * @generated Generated by: https://openapi-generator.tech
 * Generator version: 7.12.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Passage\Client;

use ArrayAccess;
use JsonSerializable;
use InvalidArgumentException;
use ReturnTypeWillChange;
use OpenAPI\Client\ObjectSerializer;
use OpenAPI\Client\Model\ModelInterface;

/**
 * PassageUser Class Doc Comment
 *
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class PassageUser implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'UserInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'created_at' => '\DateTime',
        'email' => 'string',
        'email_verified' => 'bool',
        'external_id' => 'string',
        'id' => 'string',
        'last_login_at' => '\DateTime',
        'login_count' => 'int',
        'phone' => 'string',
        'phone_verified' => 'bool',
        'recent_events' => '\OpenAPI\Client\Model\UserRecentEvent[]',
        'social_connections' => '\OpenAPI\Client\Model\UserSocialConnections',
        'status' => '\OpenAPI\Client\Model\UserStatus',
        'updated_at' => '\DateTime',
        'user_metadata' => 'object',
        'webauthn' => 'bool',
        'webauthn_devices' => '\OpenAPI\Client\Model\WebAuthnDevices[]',
        'webauthn_types' => '\OpenAPI\Client\Model\WebAuthnType[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'created_at' => 'date-time',
        'email' => null,
        'email_verified' => null,
        'external_id' => null,
        'id' => null,
        'last_login_at' => 'date-time',
        'login_count' => null,
        'phone' => null,
        'phone_verified' => null,
        'recent_events' => null,
        'social_connections' => null,
        'status' => null,
        'updated_at' => 'date-time',
        'user_metadata' => null,
        'webauthn' => null,
        'webauthn_devices' => null,
        'webauthn_types' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'created_at' => false,
        'email' => false,
        'email_verified' => false,
        'external_id' => false,
        'id' => false,
        'last_login_at' => false,
        'login_count' => false,
        'phone' => false,
        'phone_verified' => false,
        'recent_events' => false,
        'social_connections' => false,
        'status' => false,
        'updated_at' => false,
        'user_metadata' => true,
        'webauthn' => false,
        'webauthn_devices' => false,
        'webauthn_types' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var array<string, bool>
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array<string, string>
     */
    public static function openAPITypes(): array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array<string, string>
     */
    public static function openAPIFormats(): array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array<string, bool>
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return array<string, bool>
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param array<string, bool> $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var array<string, string>
     */
    protected static array $attributeMap = [
        'created_at' => 'created_at',
        'email' => 'email',
        'email_verified' => 'email_verified',
        'external_id' => 'external_id',
        'id' => 'id',
        'last_login_at' => 'last_login_at',
        'login_count' => 'login_count',
        'phone' => 'phone',
        'phone_verified' => 'phone_verified',
        'recent_events' => 'recent_events',
        'social_connections' => 'social_connections',
        'status' => 'status',
        'updated_at' => 'updated_at',
        'user_metadata' => 'user_metadata',
        'webauthn' => 'webauthn',
        'webauthn_devices' => 'webauthn_devices',
        'webauthn_types' => 'webauthn_types'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'created_at' => 'setCreatedAt',
        'email' => 'setEmail',
        'email_verified' => 'setEmailVerified',
        'external_id' => 'setExternalId',
        'id' => 'setId',
        'last_login_at' => 'setLastLoginAt',
        'login_count' => 'setLoginCount',
        'phone' => 'setPhone',
        'phone_verified' => 'setPhoneVerified',
        'recent_events' => 'setRecentEvents',
        'social_connections' => 'setSocialConnections',
        'status' => 'setStatus',
        'updated_at' => 'setUpdatedAt',
        'user_metadata' => 'setUserMetadata',
        'webauthn' => 'setWebauthn',
        'webauthn_devices' => 'setWebauthnDevices',
        'webauthn_types' => 'setWebauthnTypes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'created_at' => 'getCreatedAt',
        'email' => 'getEmail',
        'email_verified' => 'getEmailVerified',
        'external_id' => 'getExternalId',
        'id' => 'getId',
        'last_login_at' => 'getLastLoginAt',
        'login_count' => 'getLoginCount',
        'phone' => 'getPhone',
        'phone_verified' => 'getPhoneVerified',
        'recent_events' => 'getRecentEvents',
        'social_connections' => 'getSocialConnections',
        'status' => 'getStatus',
        'updated_at' => 'getUpdatedAt',
        'user_metadata' => 'getUserMetadata',
        'webauthn' => 'getWebauthn',
        'webauthn_devices' => 'getWebauthnDevices',
        'webauthn_types' => 'getWebauthnTypes'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array<string, string>
     */
    public static function attributeMap(): array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array<string, string>
     */
    public static function setters(): array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array<string, string>
     */
    public static function getters(): array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName(): string
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var array
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param array $data Associated array of property values initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('email_verified', $data ?? [], null);
        $this->setIfExists('external_id', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('last_login_at', $data ?? [], null);
        $this->setIfExists('login_count', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('phone_verified', $data ?? [], null);
        $this->setIfExists('recent_events', $data ?? [], null);
        $this->setIfExists('social_connections', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('user_metadata', $data ?? [], null);
        $this->setIfExists('webauthn', $data ?? [], null);
        $this->setIfExists('webauthn_devices', $data ?? [], null);
        $this->setIfExists('webauthn_types', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, mixed $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return string[] invalid properties with reasons
     */
    public function listInvalidProperties(): array
    {
        $invalidProperties = [];

        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['email'] === null) {
            $invalidProperties[] = "'email' can't be null";
        }
        if ($this->container['email_verified'] === null) {
            $invalidProperties[] = "'email_verified' can't be null";
        }
        if ($this->container['external_id'] === null) {
            $invalidProperties[] = "'external_id' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['last_login_at'] === null) {
            $invalidProperties[] = "'last_login_at' can't be null";
        }
        if ($this->container['login_count'] === null) {
            $invalidProperties[] = "'login_count' can't be null";
        }
        if ($this->container['phone'] === null) {
            $invalidProperties[] = "'phone' can't be null";
        }
        if ($this->container['phone_verified'] === null) {
            $invalidProperties[] = "'phone_verified' can't be null";
        }
        if ($this->container['recent_events'] === null) {
            $invalidProperties[] = "'recent_events' can't be null";
        }
        if ($this->container['social_connections'] === null) {
            $invalidProperties[] = "'social_connections' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        if ($this->container['user_metadata'] === null) {
            $invalidProperties[] = "'user_metadata' can't be null";
        }
        if ($this->container['webauthn'] === null) {
            $invalidProperties[] = "'webauthn' can't be null";
        }
        if ($this->container['webauthn_devices'] === null) {
            $invalidProperties[] = "'webauthn_devices' can't be null";
        }
        if ($this->container['webauthn_types'] === null) {
            $invalidProperties[] = "'webauthn_types' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid(): bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at created_at
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $created_at): static
    {
        if (is_null($created_at)) {
            throw new InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return $this
     */
    public function setEmail(string $email): static
    {
        if (is_null($email)) {
            throw new InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets email_verified
     *
     * @return bool
     */
    public function getEmailVerified(): bool
    {
        return $this->container['email_verified'];
    }

    /**
     * Sets email_verified
     *
     * @param bool $email_verified email_verified
     *
     * @return $this
     */
    public function setEmailVerified(bool $email_verified): static
    {
        if (is_null($email_verified)) {
            throw new InvalidArgumentException('non-nullable email_verified cannot be null');
        }
        $this->container['email_verified'] = $email_verified;

        return $this;
    }

    /**
     * Gets external_id
     *
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->container['external_id'];
    }

    /**
     * Sets external_id
     *
     * @param string $external_id The external ID of the user. Only set if the user was created in a Flex app.
     *
     * @return $this
     */
    public function setExternalId(string $external_id): static
    {
        if (is_null($external_id)) {
            throw new InvalidArgumentException('non-nullable external_id cannot be null');
        }
        $this->container['external_id'] = $external_id;

        return $this;
    }

    /**
     * Gets id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return $this
     */
    public function setId(string $id): static
    {
        if (is_null($id)) {
            throw new InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets last_login_at
     *
     * @return \DateTime
     */
    public function getLastLoginAt(): \DateTime
    {
        return $this->container['last_login_at'];
    }

    /**
     * Sets last_login_at
     *
     * @param \DateTime $last_login_at last_login_at
     *
     * @return $this
     */
    public function setLastLoginAt(\DateTime $last_login_at): static
    {
        if (is_null($last_login_at)) {
            throw new InvalidArgumentException('non-nullable last_login_at cannot be null');
        }
        $this->container['last_login_at'] = $last_login_at;

        return $this;
    }

    /**
     * Gets login_count
     *
     * @return int
     */
    public function getLoginCount(): int
    {
        return $this->container['login_count'];
    }

    /**
     * Sets login_count
     *
     * @param int $login_count login_count
     *
     * @return $this
     */
    public function setLoginCount(int $login_count): static
    {
        if (is_null($login_count)) {
            throw new InvalidArgumentException('non-nullable login_count cannot be null');
        }
        $this->container['login_count'] = $login_count;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string
     */
    public function getPhone(): string
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string $phone phone
     *
     * @return $this
     */
    public function setPhone(string $phone): static
    {
        if (is_null($phone)) {
            throw new InvalidArgumentException('non-nullable phone cannot be null');
        }
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets phone_verified
     *
     * @return bool
     */
    public function getPhoneVerified(): bool
    {
        return $this->container['phone_verified'];
    }

    /**
     * Sets phone_verified
     *
     * @param bool $phone_verified phone_verified
     *
     * @return $this
     */
    public function setPhoneVerified(bool $phone_verified): static
    {
        if (is_null($phone_verified)) {
            throw new InvalidArgumentException('non-nullable phone_verified cannot be null');
        }
        $this->container['phone_verified'] = $phone_verified;

        return $this;
    }

    /**
     * Gets recent_events
     *
     * @return \OpenAPI\Client\Model\UserRecentEvent[]
     */
    public function getRecentEvents(): array
    {
        return $this->container['recent_events'];
    }

    /**
     * Sets recent_events
     *
     * @param \OpenAPI\Client\Model\UserRecentEvent[] $recent_events recent_events
     *
     * @return $this
     */
    public function setRecentEvents(array $recent_events): static
    {
        if (is_null($recent_events)) {
            throw new InvalidArgumentException('non-nullable recent_events cannot be null');
        }
        $this->container['recent_events'] = $recent_events;

        return $this;
    }

    /**
     * Gets social_connections
     *
     * @return \OpenAPI\Client\Model\UserSocialConnections
     */
    public function getSocialConnections(): \OpenAPI\Client\Model\UserSocialConnections
    {
        return $this->container['social_connections'];
    }

    /**
     * Sets social_connections
     *
     * @param \OpenAPI\Client\Model\UserSocialConnections $social_connections social_connections
     *
     * @return $this
     */
    public function setSocialConnections(\OpenAPI\Client\Model\UserSocialConnections $social_connections): static
    {
        if (is_null($social_connections)) {
            throw new InvalidArgumentException('non-nullable social_connections cannot be null');
        }
        $this->container['social_connections'] = $social_connections;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \OpenAPI\Client\Model\UserStatus
     */
    public function getStatus(): \OpenAPI\Client\Model\UserStatus
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \OpenAPI\Client\Model\UserStatus $status status
     *
     * @return $this
     */
    public function setStatus(\OpenAPI\Client\Model\UserStatus $status): static
    {
        if (is_null($status)) {
            throw new InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at updated_at
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updated_at): static
    {
        if (is_null($updated_at)) {
            throw new InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }

    /**
     * Gets user_metadata
     *
     * @return object
     */
    public function getUserMetadata(): ?object
    {
        return $this->container['user_metadata'];
    }

    /**
     * Sets user_metadata
     *
     * @param object $user_metadata user_metadata
     *
     * @return $this
     */
    public function setUserMetadata(?object $user_metadata): static
    {
        if (is_null($user_metadata)) {
            array_push($this->openAPINullablesSetToNull, 'user_metadata');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('user_metadata', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['user_metadata'] = $user_metadata;

        return $this;
    }

    /**
     * Gets webauthn
     *
     * @return bool
     */
    public function getWebauthn(): bool
    {
        return $this->container['webauthn'];
    }

    /**
     * Sets webauthn
     *
     * @param bool $webauthn webauthn
     *
     * @return $this
     */
    public function setWebauthn(bool $webauthn): static
    {
        if (is_null($webauthn)) {
            throw new InvalidArgumentException('non-nullable webauthn cannot be null');
        }
        $this->container['webauthn'] = $webauthn;

        return $this;
    }

    /**
     * Gets webauthn_devices
     *
     * @return \OpenAPI\Client\Model\WebAuthnDevices[]
     */
    public function getWebauthnDevices(): array
    {
        return $this->container['webauthn_devices'];
    }

    /**
     * Sets webauthn_devices
     *
     * @param \OpenAPI\Client\Model\WebAuthnDevices[] $webauthn_devices webauthn_devices
     *
     * @return $this
     */
    public function setWebauthnDevices(array $webauthn_devices): static
    {
        if (is_null($webauthn_devices)) {
            throw new InvalidArgumentException('non-nullable webauthn_devices cannot be null');
        }
        $this->container['webauthn_devices'] = $webauthn_devices;

        return $this;
    }

    /**
     * Gets webauthn_types
     *
     * @return \OpenAPI\Client\Model\WebAuthnType[]
     */
    public function getWebauthnTypes(): array
    {
        return $this->container['webauthn_types'];
    }

    /**
     * Sets webauthn_types
     *
     * @param \OpenAPI\Client\Model\WebAuthnType[] $webauthn_types List of credential types that have been used for authentication
     *
     * @return $this
     */
    public function setWebauthnTypes(array $webauthn_types): static
    {
        if (is_null($webauthn_types)) {
            throw new InvalidArgumentException('non-nullable webauthn_types cannot be null');
        }
        $this->container['webauthn_types'] = $webauthn_types;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[ReturnTypeWillChange]
    public function offsetGet(mixed $offset): mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[ReturnTypeWillChange]
    public function jsonSerialize(): mixed
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString(): string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue(): string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


