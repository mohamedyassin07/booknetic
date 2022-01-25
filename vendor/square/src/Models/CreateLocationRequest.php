<?php



namespace Square\Models;

/**
 * Request object for the [CreateLocation]($e/Locations/CreateLocation) endpoint.
 */
class CreateLocationRequest implements \JsonSerializable
{
    /**
     * @var Location|null
     */
    private $location;

    /**
     * Returns Location.
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets Location.
     *
     * @maps location
     */
    public function setLocation(Location $location = null)
    {
        $this->location = $location;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->location)) {
            $json['location'] = $this->location;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
