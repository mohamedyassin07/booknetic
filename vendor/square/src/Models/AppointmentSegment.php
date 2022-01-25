<?php



namespace Square\Models;

/**
 * Defines an appointment segment of a booking.
 */
class AppointmentSegment implements \JsonSerializable
{
    /**
     * @var int
     */
    private $durationMinutes;

    /**
     * @var string
     */
    private $serviceVariationId;

    /**
     * @var string
     */
    private $teamMemberId;

    /**
     * @var int
     */
    private $serviceVariationVersion;

    /**
     * @param $durationMinutes
     * @param $serviceVariationId
     * @param $teamMemberId
     * @param $serviceVariationVersion
     */
    public function __construct(
        $durationMinutes,
        $serviceVariationId,
        $teamMemberId,
        $serviceVariationVersion
    ) {
        $this->durationMinutes = $durationMinutes;
        $this->serviceVariationId = $serviceVariationId;
        $this->teamMemberId = $teamMemberId;
        $this->serviceVariationVersion = $serviceVariationVersion;
    }

    /**
     * Returns Duration Minutes.
     *
     * The time span in minutes of an appointment segment.
     */
    public function getDurationMinutes()
    {
        return $this->durationMinutes;
    }

    /**
     * Sets Duration Minutes.
     *
     * The time span in minutes of an appointment segment.
     *
     * @required
     * @maps duration_minutes
     */
    public function setDurationMinutes($durationMinutes)
    {
        $this->durationMinutes = $durationMinutes;
    }

    /**
     * Returns Service Variation Id.
     *
     * The ID of the [CatalogItemVariation]($m/CatalogItemVariation) object representing the service booked
     * in this segment.
     */
    public function getServiceVariationId()
    {
        return $this->serviceVariationId;
    }

    /**
     * Sets Service Variation Id.
     *
     * The ID of the [CatalogItemVariation]($m/CatalogItemVariation) object representing the service booked
     * in this segment.
     *
     * @required
     * @maps service_variation_id
     */
    public function setServiceVariationId($serviceVariationId)
    {
        $this->serviceVariationId = $serviceVariationId;
    }

    /**
     * Returns Team Member Id.
     *
     * The ID of the [TeamMember]($m/TeamMember) object representing the team member booked in this segment.
     */
    public function getTeamMemberId()
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The ID of the [TeamMember]($m/TeamMember) object representing the team member booked in this segment.
     *
     * @required
     * @maps team_member_id
     */
    public function setTeamMemberId($teamMemberId)
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Service Variation Version.
     *
     * The current version of the item variation representing the service booked in this segment.
     */
    public function getServiceVariationVersion()
    {
        return $this->serviceVariationVersion;
    }

    /**
     * Sets Service Variation Version.
     *
     * The current version of the item variation representing the service booked in this segment.
     *
     * @required
     * @maps service_variation_version
     */
    public function setServiceVariationVersion($serviceVariationVersion)
    {
        $this->serviceVariationVersion = $serviceVariationVersion;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['duration_minutes']          = $this->durationMinutes;
        $json['service_variation_id']      = $this->serviceVariationId;
        $json['team_member_id']            = $this->teamMemberId;
        $json['service_variation_version'] = $this->serviceVariationVersion;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
