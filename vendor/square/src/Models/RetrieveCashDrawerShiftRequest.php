<?php



namespace Square\Models;

class RetrieveCashDrawerShiftRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $locationId;

    /**
     * @param $locationId
     */
    public function __construct($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location to retrieve cash drawer shifts from.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location to retrieve cash drawer shifts from.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_id'] = $this->locationId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
