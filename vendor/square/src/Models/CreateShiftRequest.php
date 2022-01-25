<?php



namespace Square\Models;

/**
 * Represents a request to create a `Shift`
 */
class CreateShiftRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var Shift
     */
    private $shift;

    /**
     * @param Shift $shift
     */
    public function __construct(Shift $shift)
    {
        $this->shift = $shift;
    }

    /**
     * Returns Idempotency Key.
     *
     * Unique string value to insure the idempotency of the operation.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * Unique string value to insure the idempotency of the operation.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey = null)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Shift.
     *
     * A record of the hourly rate, start, and end times for a single work shift
     * for an employee. May include a record of the start and end times for breaks
     * taken during the shift.
     */
    public function getShift()
    {
        return $this->shift;
    }

    /**
     * Sets Shift.
     *
     * A record of the hourly rate, start, and end times for a single work shift
     * for an employee. May include a record of the start and end times for breaks
     * taken during the shift.
     *
     * @required
     * @maps shift
     */
    public function setShift(Shift $shift)
    {
        $this->shift = $shift;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        $json['shift']               = $this->shift;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
