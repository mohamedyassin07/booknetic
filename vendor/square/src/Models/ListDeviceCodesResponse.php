<?php



namespace Square\Models;

class ListDeviceCodesResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var DeviceCode[]|null
     */
    private $deviceCodes;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
    }

    /**
     * Returns Device Codes.
     *
     * The queried DeviceCode.
     *
     * @return DeviceCode[]|null
     */
    public function getDeviceCodes()
    {
        return $this->deviceCodes;
    }

    /**
     * Sets Device Codes.
     *
     * The queried DeviceCode.
     *
     * @maps device_codes
     *
     * @param DeviceCode[]|null $deviceCodes
     */
    public function setDeviceCodes(array $deviceCodes = null)
    {
        $this->deviceCodes = $deviceCodes;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint. This value is present only if the request
     * succeeded and additional results are available.
     *
     * See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more
     * information.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint. This value is present only if the request
     * succeeded and additional results are available.
     *
     * See [Paginating results](https://developer.squareup.com/docs/working-with-apis/pagination) for more
     * information.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']       = $this->errors;
        }
        if (isset($this->deviceCodes)) {
            $json['device_codes'] = $this->deviceCodes;
        }
        if (isset($this->cursor)) {
            $json['cursor']       = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
