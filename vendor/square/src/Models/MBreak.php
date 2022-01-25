<?php



namespace Square\Models;

/**
 * A record of an employee's break during a shift.
 */
class MBreak implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $startAt;

    /**
     * @var string|null
     */
    private $endAt;

    /**
     * @var string
     */
    private $breakTypeId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $expectedDuration;

    /**
     * @var bool
     */
    private $isPaid;

    /**
     * @param $startAt
     * @param $breakTypeId
     * @param $name
     * @param $expectedDuration
     * @param $isPaid
     */
    public function __construct(
        $startAt,
        $breakTypeId,
        $name,
        $expectedDuration,
        $isPaid
    ) {
        $this->startAt = $startAt;
        $this->breakTypeId = $breakTypeId;
        $this->name = $name;
        $this->expectedDuration = $expectedDuration;
        $this->isPaid = $isPaid;
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
     * Returns Start At.
     *
     * RFC 3339; follows same timezone info as `Shift`. Precision up to
     * the minute is respected; seconds are truncated.
     */
    public function getStartAt()
    {
        return $this->startAt;
    }

    /**
     * Sets Start At.
     *
     * RFC 3339; follows same timezone info as `Shift`. Precision up to
     * the minute is respected; seconds are truncated.
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
     * RFC 3339; follows same timezone info as `Shift`. Precision up to
     * the minute is respected; seconds are truncated.
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Sets End At.
     *
     * RFC 3339; follows same timezone info as `Shift`. Precision up to
     * the minute is respected; seconds are truncated.
     *
     * @maps end_at
     */
    public function setEndAt($endAt = null)
    {
        $this->endAt = $endAt;
    }

    /**
     * Returns Break Type Id.
     *
     * The `BreakType` this `Break` was templated on.
     */
    public function getBreakTypeId()
    {
        return $this->breakTypeId;
    }

    /**
     * Sets Break Type Id.
     *
     * The `BreakType` this `Break` was templated on.
     *
     * @required
     * @maps break_type_id
     */
    public function setBreakTypeId($breakTypeId)
    {
        $this->breakTypeId = $breakTypeId;
    }

    /**
     * Returns Name.
     *
     * A human-readable name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * A human-readable name.
     *
     * @required
     * @maps name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns Expected Duration.
     *
     * Format: RFC-3339 P[n]Y[n]M[n]DT[n]H[n]M[n]S. The expected length of
     * the break.
     */
    public function getExpectedDuration()
    {
        return $this->expectedDuration;
    }

    /**
     * Sets Expected Duration.
     *
     * Format: RFC-3339 P[n]Y[n]M[n]DT[n]H[n]M[n]S. The expected length of
     * the break.
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
        $json['start_at']          = $this->startAt;
        if (isset($this->endAt)) {
            $json['end_at']        = $this->endAt;
        }
        $json['break_type_id']     = $this->breakTypeId;
        $json['name']              = $this->name;
        $json['expected_duration'] = $this->expectedDuration;
        $json['is_paid']           = $this->isPaid;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
