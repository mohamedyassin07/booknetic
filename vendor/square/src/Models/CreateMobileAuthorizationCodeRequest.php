<?php



namespace Square\Models;

/**
 * Defines the body parameters that can be provided in a request to the
 * __CreateMobileAuthorizationCode__ endpoint.
 */
class CreateMobileAuthorizationCodeRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $locationId;

    /**
     * Returns Location Id.
     *
     * The Square location ID the authorization code should be tied to.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The Square location ID the authorization code should be tied to.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
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
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
