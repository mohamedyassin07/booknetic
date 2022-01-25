<?php



namespace Square\Models;

/**
 * A record of the hourly rate, start, and end times for a single work shift
 * for an employee. May include a record of the start and end times for breaks
 * taken during the shift.
 */
class Shift implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $timezone;

    /**
     * @var string
     */
    private $startAt;

    /**
     * @var string|null
     */
    private $endAt;

    /**
     * @var ShiftWage|null
     */
    private $wage;

    /**
     * @var MBreak[]|null
     */
    private $breaks;

    /**
     * @var string|null
     */
    private $status;

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
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @param $startAt
     */
    public function __construct($startAt)
    {
        $this->startAt = $startAt;
    }

    /**
     * Returns Id.
     *
     * UUID for this object
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * UUID for this object
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Employee Id.
     *
     * The ID of the employee this shift belongs to. DEPRECATED at version 2020-08-26. Use `team_member_id`
     * instead
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * The ID of the employee this shift belongs to. DEPRECATED at version 2020-08-26. Use `team_member_id`
     * instead
     *
     * @maps employee_id
     */
    public function setEmployeeId($employeeId = null)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location this shift occurred at. Should be based on
     * where the employee clocked in.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location this shift occurred at. Should be based on
     * where the employee clocked in.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Timezone.
     *
     * Read-only convenience value that is calculated from the location based
     * on `location_id`. Format: the IANA Timezone Database identifier for the
     * location timezone.
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Sets Timezone.
     *
     * Read-only convenience value that is calculated from the location based
     * on `location_id`. Format: the IANA Timezone Database identifier for the
     * location timezone.
     *
     * @maps timezone
     */
    public function setTimezone($timezone = null)
    {
        $this->timezone = $timezone;
    }

    /**
     * Returns Start At.
     *
     * RFC 3339; shifted to location timezone + offset. Precision up to the
     * minute is respected; seconds are truncated.
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Sets Start At.
     *
     * RFC 3339; shifted to location timezone + offset. Precision up to the
     * minute is respected; seconds are truncated.
     *
     * @required
     * @maps start_at
     */
    public function setStartAt($startAt)
    {
        $this->startAt = $startAt;
    }

    /**
     * Returns End At.
     *
     * RFC 3339; shifted to timezone + offset. Precision up to the minute is
     * respected; seconds are truncated.
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Sets End At.
     *
     * RFC 3339; shifted to timezone + offset. Precision up to the minute is
     * respected; seconds are truncated.
     *
     * @maps end_at
     */
    public function setEndAt($endAt = null)
    {
        $this->endAt = $endAt;
    }

    /**
     * Returns Wage.
     *
     * The hourly wage rate used to compensate an employee for this shift.
     */
    public function getWage()
    {
        return $this->wage;
    }

    /**
     * Sets Wage.
     *
     * The hourly wage rate used to compensate an employee for this shift.
     *
     * @maps wage
     */
    public function setWage(ShiftWage $wage = null)
    {
        $this->wage = $wage;
    }

    /**
     * Returns Breaks.
     *
     * A list of any paid or unpaid breaks that were taken during this shift.
     *
     * @return MBreak[]|null
     */
    public function getBreaks()
    {
        return $this->breaks;
    }

    /**
     * Sets Breaks.
     *
     * A list of any paid or unpaid breaks that were taken during this shift.
     *
     * @maps breaks
     *
     * @param MBreak[]|null $breaks
     */
    public function setBreaks(array $breaks = null)
    {
        $this->breaks = $breaks;
    }

    /**
     * Returns Status.
     *
     * Enumerates the possible status of a `Shift`
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Enumerates the possible status of a `Shift`
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Version.
     *
     * Used for resolving concurrency issues; request will fail if version
     * provided does not match server version at time of request. If not provided,
     * Square executes a blind write; potentially overwriting data from another
     * write.
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * Used for resolving concurrency issues; request will fail if version
     * provided does not match server version at time of request. If not provided,
     * Square executes a blind write; potentially overwriting data from another
     * write.
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
     * A read-only timestamp in RFC 3339 format; presented in UTC.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * A read-only timestamp in RFC 3339 format; presented in UTC.
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
     * A read-only timestamp in RFC 3339 format; presented in UTC.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * A read-only timestamp in RFC 3339 format; presented in UTC.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Team Member Id.
     *
     * The ID of the team member this shift belongs to. Replaced `employee_id` at version "2020-08-26"
     */
    public function getTeamMemberId()
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The ID of the team member this shift belongs to. Replaced `employee_id` at version "2020-08-26"
     *
     * @maps team_member_id
     */
    public function setTeamMemberId($teamMemberId = null)
    {
        $this->teamMemberId = $teamMemberId;
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
            $json['id']             = $this->id;
        }
        if (isset($this->employeeId)) {
            $json['employee_id']    = $this->employeeId;
        }
        if (isset($this->locationId)) {
            $json['location_id']    = $this->locationId;
        }
        if (isset($this->timezone)) {
            $json['timezone']       = $this->timezone;
        }
        $json['start_at']           = $this->startAt;
        if (isset($this->endAt)) {
            $json['end_at']         = $this->endAt;
        }
        if (isset($this->wage)) {
            $json['wage']           = $this->wage;
        }
        if (isset($this->breaks)) {
            $json['breaks']         = $this->breaks;
        }
        if (isset($this->status)) {
            $json['status']         = $this->status;
        }
        if (isset($this->version)) {
            $json['version']        = $this->version;
        }
        if (isset($this->createdAt)) {
            $json['created_at']     = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']     = $this->updatedAt;
        }
        if (isset($this->teamMemberId)) {
            $json['team_member_id'] = $this->teamMemberId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
