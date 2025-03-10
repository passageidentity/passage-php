<?php
/**
 * WebAuthnDevices
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

namespace OpenAPI\Client\Model;

use ArrayAccess;
use JsonSerializable;
use InvalidArgumentException;
use ReturnTypeWillChange;
use OpenAPI\Client\ObjectSerializer;

/**
 * WebAuthnDevices Class Doc Comment
 *
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class WebAuthnDevices implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'WebAuthnDevices';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'created_at' => '\DateTime',
        'cred_id' => 'string',
        'friendly_name' => 'string',
        'id' => 'string',
        'last_login_at' => '\DateTime',
        'type' => '\OpenAPI\Client\Model\WebAuthnType',
        'updated_at' => '\DateTime',
        'usage_count' => 'int',
        'icons' => '\OpenAPI\Client\Model\WebAuthnIcons'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'created_at' => 'date-time',
        'cred_id' => null,
        'friendly_name' => null,
        'id' => null,
        'last_login_at' => 'date-time',
        'type' => null,
        'updated_at' => 'date-time',
        'usage_count' => null,
        'icons' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'created_at' => false,
        'cred_id' => false,
        'friendly_name' => false,
        'id' => false,
        'last_login_at' => false,
        'type' => false,
        'updated_at' => false,
        'usage_count' => false,
        'icons' => false
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
        'cred_id' => 'cred_id',
        'friendly_name' => 'friendly_name',
        'id' => 'id',
        'last_login_at' => 'last_login_at',
        'type' => 'type',
        'updated_at' => 'updated_at',
        'usage_count' => 'usage_count',
        'icons' => 'icons'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'created_at' => 'setCreatedAt',
        'cred_id' => 'setCredId',
        'friendly_name' => 'setFriendlyName',
        'id' => 'setId',
        'last_login_at' => 'setLastLoginAt',
        'type' => 'setType',
        'updated_at' => 'setUpdatedAt',
        'usage_count' => 'setUsageCount',
        'icons' => 'setIcons'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'created_at' => 'getCreatedAt',
        'cred_id' => 'getCredId',
        'friendly_name' => 'getFriendlyName',
        'id' => 'getId',
        'last_login_at' => 'getLastLoginAt',
        'type' => 'getType',
        'updated_at' => 'getUpdatedAt',
        'usage_count' => 'getUsageCount',
        'icons' => 'getIcons'
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
        $this->setIfExists('cred_id', $data ?? [], null);
        $this->setIfExists('friendly_name', $data ?? [], null);
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('last_login_at', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('usage_count', $data ?? [], null);
        $this->setIfExists('icons', $data ?? [], null);
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
        if ($this->container['cred_id'] === null) {
            $invalidProperties[] = "'cred_id' can't be null";
        }
        if ($this->container['friendly_name'] === null) {
            $invalidProperties[] = "'friendly_name' can't be null";
        }
        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['last_login_at'] === null) {
            $invalidProperties[] = "'last_login_at' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        if ($this->container['usage_count'] === null) {
            $invalidProperties[] = "'usage_count' can't be null";
        }
        if ($this->container['icons'] === null) {
            $invalidProperties[] = "'icons' can't be null";
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
     * @param \DateTime $created_at The first time this webAuthn device was used to authenticate the user
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
     * Gets cred_id
     *
     * @return string
     */
    public function getCredId(): string
    {
        return $this->container['cred_id'];
    }

    /**
     * Sets cred_id
     *
     * @param string $cred_id The CredID for this webAuthn device
     *
     * @return $this
     */
    public function setCredId(string $cred_id): static
    {
        if (is_null($cred_id)) {
            throw new InvalidArgumentException('non-nullable cred_id cannot be null');
        }
        $this->container['cred_id'] = $cred_id;

        return $this;
    }

    /**
     * Gets friendly_name
     *
     * @return string
     */
    public function getFriendlyName(): string
    {
        return $this->container['friendly_name'];
    }

    /**
     * Sets friendly_name
     *
     * @param string $friendly_name The friendly name for the webAuthn device used to authenticate
     *
     * @return $this
     */
    public function setFriendlyName(string $friendly_name): static
    {
        if (is_null($friendly_name)) {
            throw new InvalidArgumentException('non-nullable friendly_name cannot be null');
        }
        $this->container['friendly_name'] = $friendly_name;

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
     * @param string $id The ID of the webAuthn device used for authentication
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
     * @param \DateTime $last_login_at The last time this webAuthn device was used to authenticate the user
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
     * Gets type
     *
     * @return \OpenAPI\Client\Model\WebAuthnType
     */
    public function getType(): \OpenAPI\Client\Model\WebAuthnType
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \OpenAPI\Client\Model\WebAuthnType $type type
     *
     * @return $this
     */
    public function setType(\OpenAPI\Client\Model\WebAuthnType $type): static
    {
        if (is_null($type)) {
            throw new InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

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
     * @param \DateTime $updated_at The last time this webAuthn device was updated
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
     * Gets usage_count
     *
     * @return int
     */
    public function getUsageCount(): int
    {
        return $this->container['usage_count'];
    }

    /**
     * Sets usage_count
     *
     * @param int $usage_count How many times this webAuthn device has been used to authenticate the user
     *
     * @return $this
     */
    public function setUsageCount(int $usage_count): static
    {
        if (is_null($usage_count)) {
            throw new InvalidArgumentException('non-nullable usage_count cannot be null');
        }
        $this->container['usage_count'] = $usage_count;

        return $this;
    }

    /**
     * Gets icons
     *
     * @return \OpenAPI\Client\Model\WebAuthnIcons
     */
    public function getIcons(): \OpenAPI\Client\Model\WebAuthnIcons
    {
        return $this->container['icons'];
    }

    /**
     * Sets icons
     *
     * @param \OpenAPI\Client\Model\WebAuthnIcons $icons icons
     *
     * @return $this
     */
    public function setIcons(\OpenAPI\Client\Model\WebAuthnIcons $icons): static
    {
        if (is_null($icons)) {
            throw new InvalidArgumentException('non-nullable icons cannot be null');
        }
        $this->container['icons'] = $icons;

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


