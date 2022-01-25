<?php



namespace Square\Models;

/**
 * A defined break template that sets an expectation for possible `Break`
 * instances on a `Shift`.
 */
class BreakType implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string
     */
    private $breakName;

    /**
     * @var string
     */
    private $expectedDuration;

    /**
     * @var bool
     */
    private $isPaid;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param $locationId
     * @param $breakName
     * @param $expectedDuration
     * @param $isPaid
     */
    public function __construct($locationId, $breakName, $expectedDuration, $isPaid)
    {
        $this->locationId = $locationId;
        $this->breakName = $breakName;
        $this->expectedDuration = $expectedDuration;
        $this->isPaid = $isPaid;
    }

    /**
     * Returns Id.
     *
     * UUID for this object.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * UUID for this object.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the business location this type of break applies to.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the business location this type of break applies to.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Break Name.
     *
     * A human-readable name for this type of break. Will be displayed to
     * employees in Square products.
     */
    public function getBreakName()
    {
        return $this->breakName;
    }

    /**
     * Sets Break Name.
     *
     * A human-readable name for this type of break. Will be displayed to
     * employees in Square products.
     *
     * @required
     * @maps break_name
     */
    public function setBreakName($breakName)
    {
        $this->breakName = $breakName;
    }

    /**
     * Returns Expected Duration.
     *
     * Format: RFC-3339 P[n]Y[n]M[n]DT[n]H[n]M[n]S. The expected length of
     * this break. Precision below minutes is truncated.
     */
    public function getExpectedDuration()
    {
        return $this->expectedDuration;
    }

    /**
     * Sets Expected Duration.
     *
     * Format: RFC-3339 P[n]Y[n]M[n]DT[n]H[n]M[n]S. The expected length of
     * this break. Precision below minutes is truncated.
     *
     * @required
     * @maps expected_duration
     */
    public function setExpectedDuration($expectedDuration)
    {
        $this->expectedDuration = $expectedDuration;
    }

    /**
     * Returns Is Paid.
     *
     * Whether this break counts towards time worked for compensation
     * purposes.
     */
    public function getIsPaid()
    {
        return $this->isPaid;
    }

    /**
     * Sets Is Paid.
     *
     * Whether this break counts towards time worked for compensation
     * purposes.
     *
     * @required
     * @maps is_paid
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;
    }

    /**
     * Returns Version.
     *
     * Used for resolving concurrency issues; request will fail if version
     * provided does not match server version at time of request. If a value is not
     * provided, Square's servers execute a "blind" write; potentially
     * overwriting another writer's data.
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * Used for resolving concurrency issues; request will fail if version
     * provided does not match server version at time of request. If a value is not
     * provided, Square's servers execute a "blind" write; potentially
     * overwriting another writer's data.
     *
     * @maps version
     */
    public function setVersion($version = null)
    {
        $this->version = $version;
    }

    /**
     * Returns Created At.
     *
     * A read-only timestamp in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * A read-only timestamp in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * A read-only timestamp in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * A read-only timestamp in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
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
            $json['id']            = $this->id;
        }
        $json['location_id']       = $this->locationId;
        $json['break_name']        = $this->breakName;
        $json['expected_duration'] = $this->expectedDuration;
        $json['is_paid']           = $this->isPaid;
        if (isset($this->version)) {
            $json['version']       = $this->version;
        }
        if (isset($this->createdAt)) {
            $json['created_at']    = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']    = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
