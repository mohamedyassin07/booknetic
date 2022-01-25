<?php



namespace Square\Models;

class DeviceCode implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var string
     */
    private $productType;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $pairBy;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $statusChangedAt;

    /**
     * @var string|null
     */
    private $pairedAt;

    /**
     * @param $productType
     */
    public function __construct($productType)
    {
        $this->productType = $productType;
    }

    /**
     * Returns Id.
     *
     * The unique id for this device code.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The unique id for this device code.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * An optional user-defined name for the device code.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * An optional user-defined name for the device code.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns Code.
     *
     * The unique code that can be used to login.
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * The unique code that can be used to login.
     *
     * @maps code
     */
    public function setCode($code = null)
    {
        $this->code = $code;
    }

    /**
     * Returns Device Id.
     *
     * The unique id of the device that used this code. Populated when the device is paired up.
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The unique id of the device that used this code. Populated when the device is paired up.
     *
     * @maps device_id
     */
    public function setDeviceId($deviceId = null)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Product Type.
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * Sets Product Type.
     *
     * @required
     * @maps product_type
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * Returns Location Id.
     *
     * The location assigned to this code.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location assigned to this code.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Status.
     *
     * DeviceCode.Status enum.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * DeviceCode.Status enum.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Pair By.
     *
     * When this DeviceCode will expire and no longer login. Timestamp in RFC 3339 format.
     */
    public function getPairBy()
    {
        return $this->pairBy;
    }

    /**
     * Sets Pair By.
     *
     * When this DeviceCode will expire and no longer login. Timestamp in RFC 3339 format.
     *
     * @maps pair_by
     */
    public function setPairBy($pairBy = null)
    {
        $this->pairBy = $pairBy;
    }

    /**
     * Returns Created At.
     *
     * When this DeviceCode was created. Timestamp in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * When this DeviceCode was created. Timestamp in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Status Changed At.
     *
     * When this DeviceCode's status was last changed. Timestamp in RFC 3339 format.
     */
    public function getStatusChangedAt()
    {
        return $this->statusChangedAt;
    }

    /**
     * Sets Status Changed At.
     *
     * When this DeviceCode's status was last changed. Timestamp in RFC 3339 format.
     *
     * @maps status_changed_at
     */
    public function setStatusChangedAt($statusChangedAt = null)
    {
        $this->statusChangedAt = $statusChangedAt;
    }

    /**
     * Returns Paired At.
     *
     * When this DeviceCode was paired. Timestamp in RFC 3339 format.
     */
    public function getPairedAt()
    {
        return $this->pairedAt;
    }

    /**
     * Sets Paired At.
     *
     * When this DeviceCode was paired. Timestamp in RFC 3339 format.
     *
     * @maps paired_at
     */
    public function setPairedAt($pairedAt = null)
    {
        $this->pairedAt = $pairedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                = $this->id;
        }
        if (isset($this->name)) {
            $json['name']              = $this->name;
        }
        if (isset($this->code)) {
            $json['code']              = $this->code;
        }
        if (isset($this->deviceId)) {
            $json['device_id']         = $this->deviceId;
        }
        $json['product_type']          = $this->productType;
        if (isset($this->locationId)) {
            $json['location_id']       = $this->locationId;
        }
        if (isset($this->status)) {
            $json['status']            = $this->status;
        }
        if (isset($this->pairBy)) {
            $json['pair_by']           = $this->pairBy;
        }
        if (isset($this->createdAt)) {
            $json['created_at']        = $this->createdAt;
        }
        if (isset($this->statusChangedAt)) {
            $json['status_changed_at'] = $this->statusChangedAt;
        }
        if (isset($this->pairedAt)) {
            $json['paired_at']         = $this->pairedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
