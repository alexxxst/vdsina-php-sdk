<?php
/**
 * ServerServerIDGet200ResponseData
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
 * ServerServerIDGet200ResponseData Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ServerServerIDGet200ResponseData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = '_server__serverID__get_200_response_data';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'int',
        'name' => 'string',
        'full_name' => 'string',
        'created' => '\DateTime',
        'updated' => '\DateTime',
        'end' => '\DateTime',
        'status' => '\OpenAPI\Client\Model\ServiceStatus',
        'status_text' => 'string',
        'autoprolong' => 'bool',
        'ip' => '\OpenAPI\Client\Model\ServerGet200ResponseDataInnerIp',
        'ip_local' => '\OpenAPI\Client\Model\ServerServerIDGet200ResponseDataIpLocal',
        'host' => 'string',
        'data' => '\OpenAPI\Client\Model\Tariff',
        'server_plan' => '\OpenAPI\Client\Model\ServerGet200ResponseDataInnerServerPlan',
        'template' => '\OpenAPI\Client\Model\ServerGet200ResponseDataInnerTemplate',
        'datacenter' => '\OpenAPI\Client\Model\Datacenter',
        'ssh_key' => '\OpenAPI\Client\Model\ServerServerIDGet200ResponseDataSshKey',
        'can' => '\OpenAPI\Client\Model\ServerServerIDGet200ResponseDataCan',
        'bandwidth' => '\OpenAPI\Client\Model\ServerServerIDGet200ResponseDataBandwidth'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'name' => null,
        'full_name' => null,
        'created' => 'date',
        'updated' => 'date',
        'end' => 'date',
        'status' => null,
        'status_text' => null,
        'autoprolong' => null,
        'ip' => null,
        'ip_local' => null,
        'host' => 'hostname',
        'data' => null,
        'server_plan' => null,
        'template' => null,
        'datacenter' => null,
        'ssh_key' => null,
        'can' => null,
        'bandwidth' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'name' => false,
        'full_name' => false,
        'created' => false,
        'updated' => false,
        'end' => false,
        'status' => false,
        'status_text' => false,
        'autoprolong' => false,
        'ip' => true,
        'ip_local' => true,
        'host' => false,
        'data' => true,
        'server_plan' => false,
        'template' => false,
        'datacenter' => true,
        'ssh_key' => true,
        'can' => false,
        'bandwidth' => false
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
        'id' => 'id',
        'name' => 'name',
        'full_name' => 'full_name',
        'created' => 'created',
        'updated' => 'updated',
        'end' => 'end',
        'status' => 'status',
        'status_text' => 'status_text',
        'autoprolong' => 'autoprolong',
        'ip' => 'ip',
        'ip_local' => 'ip_local',
        'host' => 'host',
        'data' => 'data',
        'server_plan' => 'server-plan',
        'template' => 'template',
        'datacenter' => 'datacenter',
        'ssh_key' => 'ssh-key',
        'can' => 'can',
        'bandwidth' => 'bandwidth'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'name' => 'setName',
        'full_name' => 'setFullName',
        'created' => 'setCreated',
        'updated' => 'setUpdated',
        'end' => 'setEnd',
        'status' => 'setStatus',
        'status_text' => 'setStatusText',
        'autoprolong' => 'setAutoprolong',
        'ip' => 'setIp',
        'ip_local' => 'setIpLocal',
        'host' => 'setHost',
        'data' => 'setData',
        'server_plan' => 'setServerPlan',
        'template' => 'setTemplate',
        'datacenter' => 'setDatacenter',
        'ssh_key' => 'setSshKey',
        'can' => 'setCan',
        'bandwidth' => 'setBandwidth'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'name' => 'getName',
        'full_name' => 'getFullName',
        'created' => 'getCreated',
        'updated' => 'getUpdated',
        'end' => 'getEnd',
        'status' => 'getStatus',
        'status_text' => 'getStatusText',
        'autoprolong' => 'getAutoprolong',
        'ip' => 'getIp',
        'ip_local' => 'getIpLocal',
        'host' => 'getHost',
        'data' => 'getData',
        'server_plan' => 'getServerPlan',
        'template' => 'getTemplate',
        'datacenter' => 'getDatacenter',
        'ssh_key' => 'getSshKey',
        'can' => 'getCan',
        'bandwidth' => 'getBandwidth'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('full_name', $data ?? [], null);
        $this->setIfExists('created', $data ?? [], null);
        $this->setIfExists('updated', $data ?? [], null);
        $this->setIfExists('end', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('status_text', $data ?? [], null);
        $this->setIfExists('autoprolong', $data ?? [], null);
        $this->setIfExists('ip', $data ?? [], null);
        $this->setIfExists('ip_local', $data ?? [], null);
        $this->setIfExists('host', $data ?? [], null);
        $this->setIfExists('data', $data ?? [], null);
        $this->setIfExists('server_plan', $data ?? [], null);
        $this->setIfExists('template', $data ?? [], null);
        $this->setIfExists('datacenter', $data ?? [], null);
        $this->setIfExists('ssh_key', $data ?? [], null);
        $this->setIfExists('can', $data ?? [], null);
        $this->setIfExists('bandwidth', $data ?? [], null);
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
     * Gets id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int|null $id Server ID
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Server name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets full_name
     *
     * @return string|null
     */
    public function getFullName()
    {
        return $this->container['full_name'];
    }

    /**
     * Sets full_name
     *
     * @param string|null $full_name Service name
     *
     * @return self
     */
    public function setFullName($full_name)
    {
        if (is_null($full_name)) {
            throw new \InvalidArgumentException('non-nullable full_name cannot be null');
        }
        $this->container['full_name'] = $full_name;

        return $this;
    }

    /**
     * Gets created
     *
     * @return \DateTime|null
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param \DateTime|null $created Service create date
     *
     * @return self
     */
    public function setCreated($created)
    {
        if (is_null($created)) {
            throw new \InvalidArgumentException('non-nullable created cannot be null');
        }
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets updated
     *
     * @return \DateTime|null
     */
    public function getUpdated()
    {
        return $this->container['updated'];
    }

    /**
     * Sets updated
     *
     * @param \DateTime|null $updated Service update date
     *
     * @return self
     */
    public function setUpdated($updated)
    {
        if (is_null($updated)) {
            throw new \InvalidArgumentException('non-nullable updated cannot be null');
        }
        $this->container['updated'] = $updated;

        return $this;
    }

    /**
     * Gets end
     *
     * @return \DateTime|null
     */
    public function getEnd()
    {
        return $this->container['end'];
    }

    /**
     * Sets end
     *
     * @param \DateTime|null $end Service end date
     *
     * @return self
     */
    public function setEnd($end)
    {
        if (is_null($end)) {
            throw new \InvalidArgumentException('non-nullable end cannot be null');
        }
        $this->container['end'] = $end;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \OpenAPI\Client\Model\ServiceStatus|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \OpenAPI\Client\Model\ServiceStatus|null $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets status_text
     *
     * @return string|null
     */
    public function getStatusText()
    {
        return $this->container['status_text'];
    }

    /**
     * Sets status_text
     *
     * @param string|null $status_text Service status description
     *
     * @return self
     */
    public function setStatusText($status_text)
    {
        if (is_null($status_text)) {
            throw new \InvalidArgumentException('non-nullable status_text cannot be null');
        }
        $this->container['status_text'] = $status_text;

        return $this;
    }

    /**
     * Gets autoprolong
     *
     * @return bool|null
     */
    public function getAutoprolong()
    {
        return $this->container['autoprolong'];
    }

    /**
     * Sets autoprolong
     *
     * @param bool|null $autoprolong Automatic prolongation
     *
     * @return self
     */
    public function setAutoprolong($autoprolong)
    {
        if (is_null($autoprolong)) {
            throw new \InvalidArgumentException('non-nullable autoprolong cannot be null');
        }
        $this->container['autoprolong'] = $autoprolong;

        return $this;
    }

    /**
     * Gets ip
     *
     * @return \OpenAPI\Client\Model\ServerGet200ResponseDataInnerIp|null
     */
    public function getIp()
    {
        return $this->container['ip'];
    }

    /**
     * Sets ip
     *
     * @param \OpenAPI\Client\Model\ServerGet200ResponseDataInnerIp|null $ip ip
     *
     * @return self
     */
    public function setIp($ip)
    {
        if (is_null($ip)) {
            array_push($this->openAPINullablesSetToNull, 'ip');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ip', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ip'] = $ip;

        return $this;
    }

    /**
     * Gets ip_local
     *
     * @return \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataIpLocal|null
     */
    public function getIpLocal()
    {
        return $this->container['ip_local'];
    }

    /**
     * Sets ip_local
     *
     * @param \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataIpLocal|null $ip_local ip_local
     *
     * @return self
     */
    public function setIpLocal($ip_local)
    {
        if (is_null($ip_local)) {
            array_push($this->openAPINullablesSetToNull, 'ip_local');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ip_local', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ip_local'] = $ip_local;

        return $this;
    }

    /**
     * Gets host
     *
     * @return string|null
     */
    public function getHost()
    {
        return $this->container['host'];
    }

    /**
     * Sets host
     *
     * @param string|null $host Server hostname
     *
     * @return self
     */
    public function setHost($host)
    {
        if (is_null($host)) {
            throw new \InvalidArgumentException('non-nullable host cannot be null');
        }
        $this->container['host'] = $host;

        return $this;
    }

    /**
     * Gets data
     *
     * @return \OpenAPI\Client\Model\Tariff|null
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param \OpenAPI\Client\Model\Tariff|null $data data
     *
     * @return self
     */
    public function setData($data)
    {
        if (is_null($data)) {
            array_push($this->openAPINullablesSetToNull, 'data');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('data', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets server_plan
     *
     * @return \OpenAPI\Client\Model\ServerGet200ResponseDataInnerServerPlan|null
     */
    public function getServerPlan()
    {
        return $this->container['server_plan'];
    }

    /**
     * Sets server_plan
     *
     * @param \OpenAPI\Client\Model\ServerGet200ResponseDataInnerServerPlan|null $server_plan server_plan
     *
     * @return self
     */
    public function setServerPlan($server_plan)
    {
        if (is_null($server_plan)) {
            throw new \InvalidArgumentException('non-nullable server_plan cannot be null');
        }
        $this->container['server_plan'] = $server_plan;

        return $this;
    }

    /**
     * Gets template
     *
     * @return \OpenAPI\Client\Model\ServerGet200ResponseDataInnerTemplate|null
     */
    public function getTemplate()
    {
        return $this->container['template'];
    }

    /**
     * Sets template
     *
     * @param \OpenAPI\Client\Model\ServerGet200ResponseDataInnerTemplate|null $template template
     *
     * @return self
     */
    public function setTemplate($template)
    {
        if (is_null($template)) {
            throw new \InvalidArgumentException('non-nullable template cannot be null');
        }
        $this->container['template'] = $template;

        return $this;
    }

    /**
     * Gets datacenter
     *
     * @return \OpenAPI\Client\Model\Datacenter|null
     */
    public function getDatacenter()
    {
        return $this->container['datacenter'];
    }

    /**
     * Sets datacenter
     *
     * @param \OpenAPI\Client\Model\Datacenter|null $datacenter datacenter
     *
     * @return self
     */
    public function setDatacenter($datacenter)
    {
        if (is_null($datacenter)) {
            array_push($this->openAPINullablesSetToNull, 'datacenter');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('datacenter', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['datacenter'] = $datacenter;

        return $this;
    }

    /**
     * Gets ssh_key
     *
     * @return \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataSshKey|null
     */
    public function getSshKey()
    {
        return $this->container['ssh_key'];
    }

    /**
     * Sets ssh_key
     *
     * @param \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataSshKey|null $ssh_key ssh_key
     *
     * @return self
     */
    public function setSshKey($ssh_key)
    {
        if (is_null($ssh_key)) {
            array_push($this->openAPINullablesSetToNull, 'ssh_key');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('ssh_key', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['ssh_key'] = $ssh_key;

        return $this;
    }

    /**
     * Gets can
     *
     * @return \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataCan|null
     */
    public function getCan()
    {
        return $this->container['can'];
    }

    /**
     * Sets can
     *
     * @param \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataCan|null $can can
     *
     * @return self
     */
    public function setCan($can)
    {
        if (is_null($can)) {
            throw new \InvalidArgumentException('non-nullable can cannot be null');
        }
        $this->container['can'] = $can;

        return $this;
    }

    /**
     * Gets bandwidth
     *
     * @return \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataBandwidth|null
     */
    public function getBandwidth()
    {
        return $this->container['bandwidth'];
    }

    /**
     * Sets bandwidth
     *
     * @param \OpenAPI\Client\Model\ServerServerIDGet200ResponseDataBandwidth|null $bandwidth bandwidth
     *
     * @return self
     */
    public function setBandwidth($bandwidth)
    {
        if (is_null($bandwidth)) {
            throw new \InvalidArgumentException('non-nullable bandwidth cannot be null');
        }
        $this->container['bandwidth'] = $bandwidth;

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


