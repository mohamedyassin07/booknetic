<?php



namespace Square\Models;

/**
 * Response object returned by the [UpdateLocation]($e/Locations/UpdateLocation) endpoint.
 */
class UpdateLocationResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Location|null
     */
    private $location;

    /**
     * Returns Errors.
     *
     * Information on errors encountered during the request.
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
     * Information on errors encountered during the request.
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
        if (isset($this->errors)) {
            $json['errors']   = $this->errors;
        }
        if (isset($this->location)) {
            $json['location'] = $this->location;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
