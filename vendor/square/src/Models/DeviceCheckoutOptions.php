<?php



namespace Square\Models;

class DeviceCheckoutOptions implements \JsonSerializable
{
    /**
     * @var string
     */
    private $deviceId;

    /**
     * @var bool|null
     */
    private $skipReceiptScreen;

    /**
     * @var TipSettings|null
     */
    private $tipSettings;

    /**
     * @param $deviceId
     */
    public function __construct($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Device Id.
     *
     * The unique ID of the device intended for this `TerminalCheckout`.
     * A list of `DeviceCode` objects can be retrieved from the /v2/devices/codes endpoint.
     * Match a `DeviceCode.device_id` value with `device_id` to get the associated device code.
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The unique ID of the device intended for this `TerminalCheckout`.
     * A list of `DeviceCode` objects can be retrieved from the /v2/devices/codes endpoint.
     * Match a `DeviceCode.device_id` value with `device_id` to get the associated device code.
     *
     * @required
     * @maps device_id
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Skip Receipt Screen.
     *
     * Instructs the device to skip the receipt screen. Defaults to false.
     */
    public function getSkipReceiptScreen()
    {
        return $this->skipReceiptScreen;
    }

    /**
     * Sets Skip Receipt Screen.
     *
     * Instructs the device to skip the receipt screen. Defaults to false.
     *
     * @maps skip_receipt_screen
     */
    public function setSkipReceiptScreen($skipReceiptScreen = null)
    {
        $this->skipReceiptScreen = $skipReceiptScreen;
    }

    /**
     * Returns Tip Settings.
     */
    public function getTipSettings()
    {
        return $this->tipSettings;
    }

    /**
     * Sets Tip Settings.
     *
     * @maps tip_settings
     */
    public function setTipSettings(TipSettings $tipSettings = null)
    {
        $this->tipSettings = $tipSettings;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['device_id']               = $this->deviceId;
        if (isset($this->skipReceiptScreen)) {
            $json['skip_receipt_screen'] = $this->skipReceiptScreen;
        }
        if (isset($this->tipSettings)) {
            $json['tip_settings']        = $this->tipSettings;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
