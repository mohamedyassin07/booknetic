<?php



namespace Square\Models;

class CreateDeviceCodeRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var DeviceCode
     */
    private $deviceCode;

    /**
     * @param $idempotencyKey
     * @param DeviceCode $deviceCode
     */
    public function __construct($idempotencyKey, DeviceCode $deviceCode)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->deviceCode = $deviceCode;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this CreateDeviceCode request. Keys can
     * be any valid string but must be unique for every CreateDeviceCode request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this CreateDeviceCode request. Keys can
     * be any valid string but must be unique for every CreateDeviceCode request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Device Code.
     */
    public function getDeviceCode()
    {
        return $this->deviceCode;
    }

    /**
     * Sets Device Code.
     *
     * @required
     * @maps device_code
     */
    public function setDeviceCode(DeviceCode $deviceCode)
    {
        $this->deviceCode = $deviceCode;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['device_code']     = $this->deviceCode;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
