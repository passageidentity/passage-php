<?php
/**
 * PaginatedLinks
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
 * PaginatedLinks Class Doc Comment
 *
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements ArrayAccess<string, mixed>
 */
class PaginatedLinks implements ModelInterface, ArrayAccess, JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'PaginatedLinks';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var array<string, string>
      */
    protected static array $openAPITypes = [
        'first' => '\OpenAPI\Client\Model\Link',
        'last' => '\OpenAPI\Client\Model\Link',
        'next' => '\OpenAPI\Client\Model\Link',
        'previous' => '\OpenAPI\Client\Model\Link',
        'self' => '\OpenAPI\Client\Model\Link'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'first' => null,
        'last' => null,
        'next' => null,
        'previous' => null,
        'self' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var array<string, bool>
      */
    protected static array $openAPINullables = [
        'first' => false,
        'last' => false,
        'next' => false,
        'previous' => false,
        'self' => false
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
        'first' => 'first',
        'last' => 'last',
        'next' => 'next',
        'previous' => 'previous',
        'self' => 'self'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var array<string, string>
     */
    protected static array $setters = [
        'first' => 'setFirst',
        'last' => 'setLast',
        'next' => 'setNext',
        'previous' => 'setPrevious',
        'self' => 'setSelf'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var array<string, string>
     */
    protected static array $getters = [
        'first' => 'getFirst',
        'last' => 'getLast',
        'next' => 'getNext',
        'previous' => 'getPrevious',
        'self' => 'getSelf'
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
        $this->setIfExists('first', $data ?? [], null);
        $this->setIfExists('last', $data ?? [], null);
        $this->setIfExists('next', $data ?? [], null);
        $this->setIfExists('previous', $data ?? [], null);
        $this->setIfExists('self', $data ?? [], null);
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

        if ($this->container['first'] === null) {
            $invalidProperties[] = "'first' can't be null";
        }
        if ($this->container['last'] === null) {
            $invalidProperties[] = "'last' can't be null";
        }
        if ($this->container['next'] === null) {
            $invalidProperties[] = "'next' can't be null";
        }
        if ($this->container['previous'] === null) {
            $invalidProperties[] = "'previous' can't be null";
        }
        if ($this->container['self'] === null) {
            $invalidProperties[] = "'self' can't be null";
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
     * Gets first
     *
     * @return \OpenAPI\Client\Model\Link
     */
    public function getFirst(): \OpenAPI\Client\Model\Link
    {
        return $this->container['first'];
    }

    /**
     * Sets first
     *
     * @param \OpenAPI\Client\Model\Link $first first
     *
     * @return $this
     */
    public function setFirst(\OpenAPI\Client\Model\Link $first): static
    {
        if (is_null($first)) {
            throw new InvalidArgumentException('non-nullable first cannot be null');
        }
        $this->container['first'] = $first;

        return $this;
    }

    /**
     * Gets last
     *
     * @return \OpenAPI\Client\Model\Link
     */
    public function getLast(): \OpenAPI\Client\Model\Link
    {
        return $this->container['last'];
    }

    /**
     * Sets last
     *
     * @param \OpenAPI\Client\Model\Link $last last
     *
     * @return $this
     */
    public function setLast(\OpenAPI\Client\Model\Link $last): static
    {
        if (is_null($last)) {
            throw new InvalidArgumentException('non-nullable last cannot be null');
        }
        $this->container['last'] = $last;

        return $this;
    }

    /**
     * Gets next
     *
     * @return \OpenAPI\Client\Model\Link
     */
    public function getNext(): \OpenAPI\Client\Model\Link
    {
        return $this->container['next'];
    }

    /**
     * Sets next
     *
     * @param \OpenAPI\Client\Model\Link $next next
     *
     * @return $this
     */
    public function setNext(\OpenAPI\Client\Model\Link $next): static
    {
        if (is_null($next)) {
            throw new InvalidArgumentException('non-nullable next cannot be null');
        }
        $this->container['next'] = $next;

        return $this;
    }

    /**
     * Gets previous
     *
     * @return \OpenAPI\Client\Model\Link
     */
    public function getPrevious(): \OpenAPI\Client\Model\Link
    {
        return $this->container['previous'];
    }

    /**
     * Sets previous
     *
     * @param \OpenAPI\Client\Model\Link $previous previous
     *
     * @return $this
     */
    public function setPrevious(\OpenAPI\Client\Model\Link $previous): static
    {
        if (is_null($previous)) {
            throw new InvalidArgumentException('non-nullable previous cannot be null');
        }
        $this->container['previous'] = $previous;

        return $this;
    }

    /**
     * Gets self
     *
     * @return \OpenAPI\Client\Model\Link
     */
    public function getSelf(): \OpenAPI\Client\Model\Link
    {
        return $this->container['self'];
    }

    /**
     * Sets self
     *
     * @param \OpenAPI\Client\Model\Link $self self
     *
     * @return $this
     */
    public function setSelf(\OpenAPI\Client\Model\Link $self): static
    {
        if (is_null($self)) {
            throw new InvalidArgumentException('non-nullable self cannot be null');
        }
        $this->container['self'] = $self;

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


