<?php



namespace Square\Models;

/**
 * A response to request to get a `Shift`. Contains
 * the requested `Shift` object. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class GetShiftResponse implements \JsonSerializable
{
    /**
     * @var Shift|null
     */
    private $shift;

    /**
     * @var Error[]|null
     */
    private $errors;

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
     * @maps shift
     */
    public function setShift(Shift $shift = null)
    {
        $this->shift = $shift;
    }

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
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
     * Any errors that occurred during the request.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->shift)) {
            $json['shift']  = $this->shift;
        }
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
