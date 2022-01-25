<?php



namespace Square\Models;

/**
 * Details about the device that took the payment.
 */
class DeviceDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var string|null
     */
    private $deviceInstallationId;

    /**
     * @var string|null
     */
    private $deviceName;

    /**
     * Returns Device Id.
     *
     * The Square-issued ID of the device.
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The Square-issued ID of the device.
     *
     * @maps device_id
     */
    public function setDeviceId($deviceId = null)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Device Installation Id.
     *
     * The Square-issued installation ID for the device.
     */
    public function getDeviceInstallationId()
    {
        return $this->deviceInstallationId;
    }

    /**
     * Sets Device Installation Id.
     *
     * The Square-issued installation ID for the device.
     *
     * @maps device_installation_id
     */
    public function setDeviceInstallationId($deviceInstallationId = null)
    {
        $this->deviceInstallationId = $deviceInstallationId;
    }

    /**
     * Returns Device Name.
     *
     * The name of the device set by the seller.
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * Sets Device Name.
     *
     * The name of the device set by the seller.
     *
     * @maps device_name
     */
    public function setDeviceName($deviceName = null)
    {
        $this->deviceName = $deviceName;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->deviceId)) {
            $json['device_id']              = $this->deviceId;
        }
        if (isset($this->deviceInstallationId)) {
            $json['device_installation_id'] = $this->deviceInstallationId;
        }
        if (isset($this->deviceName)) {
            $json['device_name']            = $this->deviceName;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
