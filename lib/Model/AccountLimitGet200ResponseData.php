<?php
/**
 * AccountLimitGet200ResponseData
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * VDSina public API
 *
 * The data format of the incoming request and the returned data: JSON. All dates and timestamps are returned in the Europe/Moscow zone (the time zone in which the API server is located). A permanent authorization token can be obtained in the personal account in viewing the user's account information. The token changes when the user's password is changed. The token will have the same access rights as the specified user on whose behalf the token request was made. If you need to restrict actions for API requests, you need to create a separate user in the account with the necessary set of rights and make requests with this user's token.
 *
 * The version of the OpenAPI document: 1.2.0
 * Contact: support@vdsina.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.11.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * AccountLimitGet200ResponseData Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AccountLimitGet200ResponseData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = '_account_limit_get_200_response_data';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'server' => '\OpenAPI\Client\Model\Limit',
        'server_ip4' => '\OpenAPI\Client\Model\LimitChild',
        'server_ip6' => '\OpenAPI\Client\Model\LimitChild',
        'iso' => '\OpenAPI\Client\Model\Limit',
        'backup' => '\OpenAPI\Client\Model\Limit',
        'ssl' => '\OpenAPI\Client\Model\Limit',
        'domain' => '\OpenAPI\Client\Model\Limit',
        'dns' => '\OpenAPI\Client\Model\Limit',
        'extdisk_hdd' => '\OpenAPI\Client\Model\Limit',
        'extdisk_nvme' => '\OpenAPI\Client\Model\Limit',
        'reserve_ip' => '\OpenAPI\Client\Model\Limit'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'server' => null,
        'server_ip4' => null,
        'server_ip6' => null,
        'iso' => null,
        'backup' => null,
        'ssl' => null,
        'domain' => null,
        'dns' => null,
        'extdisk_hdd' => null,
        'extdisk_nvme' => null,
        'reserve_ip' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'server' => true,
        'server_ip4' => true,
        'server_ip6' => true,
        'iso' => true,
        'backup' => true,
        'ssl' => true,
        'domain' => true,
        'dns' => true,
        'extdisk_hdd' => true,
        'extdisk_nvme' => true,
        'reserve_ip' => true
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
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
     * @var string[]
     */
    protected static $attributeMap = [
        'server' => 'server',
        'server_ip4' => 'server-ip4',
        'server_ip6' => 'server-ip6',
        'iso' => 'iso',
        'backup' => 'backup',
        'ssl' => 'ssl',
        'domain' => 'domain',
        'dns' => 'dns',
        'extdisk_hdd' => 'extdisk-hdd',
        'extdisk_nvme' => 'extdisk-nvme',
        'reserve_ip' => 'reserve-ip'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'server' => 'setServer',
        'server_ip4' => 'setServerIp4',
        'server_ip6' => 'setServerIp6',
        'iso' => 'setIso',
        'backup' => 'setBackup',
        'ssl' => 'setSsl',
        'domain' => 'setDomain',
        'dns' => 'setDns',
        'extdisk_hdd' => 'setExtdiskHdd',
        'extdisk_nvme' => 'setExtdiskNvme',
        'reserve_ip' => 'setReserveIp'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'server' => 'getServer',
        'server_ip4' => 'getServerIp4',
        'server_ip6' => 'getServerIp6',
        'iso' => 'getIso',
        'backup' => 'getBackup',
        'ssl' => 'getSsl',
        'domain' => 'getDomain',
        'dns' => 'getDns',
        'extdisk_hdd' => 'getExtdiskHdd',
        'extdisk_nvme' => 'getExtdiskNvme',
        'reserve_ip' => 'getReserveIp'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('server', $data ?? [], null);
        $this->setIfExists('server_ip4', $data ?? [], null);
        $this->setIfExists('server_ip6', $data ?? [], null);
        $this->setIfExists('iso', $data ?? [], null);
        $this->setIfExists('backup', $data ?? [], null);
        $this->setIfExists('ssl', $data ?? [], null);
        $this->setIfExists('domain', $data ?? [], null);
        $this->setIfExists('dns', $data ?? [], null);
        $this->setIfExists('extdisk_hdd', $data ?? [], null);
        $this->setIfExists('extdisk_nvme', $data ?? [], null);
        $this->setIfExists('reserve_ip', $data ?? [], null);
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
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets server
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getServer()
    {
        return $this->container['server'];
    }

    /**
     * Sets server
     *
     * @param \OpenAPI\Client\Model\Limit|null $server server
     *
     * @return self
     */
    public function setServer($server)
    {
        if (is_null($server)) {
            array_push($this->openAPINullablesSetToNull, 'server');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('server', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['server'] = $server;

        return $this;
    }

    /**
     * Gets server_ip4
     *
     * @return \OpenAPI\Client\Model\LimitChild|null
     */
    public function getServerIp4()
    {
        return $this->container['server_ip4'];
    }

    /**
     * Sets server_ip4
     *
     * @param \OpenAPI\Client\Model\LimitChild|null $server_ip4 server_ip4
     *
     * @return self
     */
    public function setServerIp4($server_ip4)
    {
        if (is_null($server_ip4)) {
            array_push($this->openAPINullablesSetToNull, 'server_ip4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('server_ip4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['server_ip4'] = $server_ip4;

        return $this;
    }

    /**
     * Gets server_ip6
     *
     * @return \OpenAPI\Client\Model\LimitChild|null
     */
    public function getServerIp6()
    {
        return $this->container['server_ip6'];
    }

    /**
     * Sets server_ip6
     *
     * @param \OpenAPI\Client\Model\LimitChild|null $server_ip6 server_ip6
     *
     * @return self
     */
    public function setServerIp6($server_ip6)
    {
        if (is_null($server_ip6)) {
            array_push($this->openAPINullablesSetToNull, 'server_ip6');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('server_ip6', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['server_ip6'] = $server_ip6;

        return $this;
    }

    /**
     * Gets iso
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getIso()
    {
        return $this->container['iso'];
    }

    /**
     * Sets iso
     *
     * @param \OpenAPI\Client\Model\Limit|null $iso iso
     *
     * @return self
     */
    public function setIso($iso)
    {
        if (is_null($iso)) {
            array_push($this->openAPINullablesSetToNull, 'iso');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('iso', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['iso'] = $iso;

        return $this;
    }

    /**
     * Gets backup
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getBackup()
    {
        return $this->container['backup'];
    }

    /**
     * Sets backup
     *
     * @param \OpenAPI\Client\Model\Limit|null $backup backup
     *
     * @return self
     */
    public function setBackup($backup)
    {
        if (is_null($backup)) {
            array_push($this->openAPINullablesSetToNull, 'backup');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('backup', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['backup'] = $backup;

        return $this;
    }

    /**
     * Gets ssl
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getSsl()
    {
        return $this->container['ssl'];
    }

    /**
     * Sets ssl
     *
     * @param \OpenAPI\Client\Model\Limit|null $ssl ssl
     *
     * @return self
     */
    public function setSsl($ssl)
    {
        if (is_null($ssl)) {
            array_push($this->openAPINullablesSetToNull, 'ssl');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ssl', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ssl'] = $ssl;

        return $this;
    }

    /**
     * Gets domain
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getDomain()
    {
        return $this->container['domain'];
    }

    /**
     * Sets domain
     *
     * @param \OpenAPI\Client\Model\Limit|null $domain domain
     *
     * @return self
     */
    public function setDomain($domain)
    {
        if (is_null($domain)) {
            array_push($this->openAPINullablesSetToNull, 'domain');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('domain', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['domain'] = $domain;

        return $this;
    }

    /**
     * Gets dns
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getDns()
    {
        return $this->container['dns'];
    }

    /**
     * Sets dns
     *
     * @param \OpenAPI\Client\Model\Limit|null $dns dns
     *
     * @return self
     */
    public function setDns($dns)
    {
        if (is_null($dns)) {
            array_push($this->openAPINullablesSetToNull, 'dns');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dns', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['dns'] = $dns;

        return $this;
    }

    /**
     * Gets extdisk_hdd
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getExtdiskHdd()
    {
        return $this->container['extdisk_hdd'];
    }

    /**
     * Sets extdisk_hdd
     *
     * @param \OpenAPI\Client\Model\Limit|null $extdisk_hdd extdisk_hdd
     *
     * @return self
     */
    public function setExtdiskHdd($extdisk_hdd)
    {
        if (is_null($extdisk_hdd)) {
            array_push($this->openAPINullablesSetToNull, 'extdisk_hdd');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('extdisk_hdd', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['extdisk_hdd'] = $extdisk_hdd;

        return $this;
    }

    /**
     * Gets extdisk_nvme
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getExtdiskNvme()
    {
        return $this->container['extdisk_nvme'];
    }

    /**
     * Sets extdisk_nvme
     *
     * @param \OpenAPI\Client\Model\Limit|null $extdisk_nvme extdisk_nvme
     *
     * @return self
     */
    public function setExtdiskNvme($extdisk_nvme)
    {
        if (is_null($extdisk_nvme)) {
            array_push($this->openAPINullablesSetToNull, 'extdisk_nvme');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('extdisk_nvme', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['extdisk_nvme'] = $extdisk_nvme;

        return $this;
    }

    /**
     * Gets reserve_ip
     *
     * @return \OpenAPI\Client\Model\Limit|null
     */
    public function getReserveIp()
    {
        return $this->container['reserve_ip'];
    }

    /**
     * Sets reserve_ip
     *
     * @param \OpenAPI\Client\Model\Limit|null $reserve_ip reserve_ip
     *
     * @return self
     */
    public function setReserveIp($reserve_ip)
    {
        if (is_null($reserve_ip)) {
            array_push($this->openAPINullablesSetToNull, 'reserve_ip');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reserve_ip', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reserve_ip'] = $reserve_ip;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
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
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
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
    public function offsetSet($offset, $value): void
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
    public function offsetUnset($offset): void
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
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
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
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


