<?php



namespace Square\Models;

class ListDeviceCodesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $productType;

    /**
     * @var string[]|null
     */
    private $status;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
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
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
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
     * Returns Location Id.
     *
     * If specified, only returns DeviceCodes of the specified location.
     * Returns DeviceCodes of all locations if empty.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * If specified, only returns DeviceCodes of the specified location.
     * Returns DeviceCodes of all locations if empty.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
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
     * @maps product_type
     */
    public function setProductType($productType = null)
    {
        $this->productType = $productType;
    }

    /**
     * Returns Status.
     *
     * If specified, returns DeviceCodes with the specified statuses.
     * Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty.
     * See [DeviceCodeStatus](#type-devicecodestatus) for possible values
     *
     * @return string[]|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * If specified, returns DeviceCodes with the specified statuses.
     * Returns DeviceCodes of status `PAIRED` and `UNPAIRED` if empty.
     * See [DeviceCodeStatus](#type-devicecodestatus) for possible values
     *
     * @maps status
     *
     * @param string[]|null $status
     */
    public function setStatus(array $status = null)
    {
        $this->status = $status;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor']       = $this->cursor;
        }
        if (isset($this->locationId)) {
            $json['location_id']  = $this->locationId;
        }
        if (isset($this->productType)) {
            $json['product_type'] = $this->productType;
        }
        if (isset($this->status)) {
            $json['status']       = $this->status;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
