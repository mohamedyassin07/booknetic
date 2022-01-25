<?php



namespace Square\Models;

/**
 * The response to a request to get a `BreakType`. Contains
 * the requested `BreakType` objects. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class GetBreakTypeResponse implements \JsonSerializable
{
    /**
     * @var BreakType|null
     */
    private $breakType;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Break Type.
     *
     * A defined break template that sets an expectation for possible `Break`
     * instances on a `Shift`.
     */
    public function getBreakType()
    {
        return $this->breakType;
    }

    /**
     * Sets Break Type.
     *
     * A defined break template that sets an expectation for possible `Break`
     * instances on a `Shift`.
     *
     * @maps break_type
     */
    public function setBreakType(BreakType $breakType = null)
    {
        $this->breakType = $breakType;
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
        if (isset($this->breakType)) {
            $json['break_type'] = $this->breakType;
        }
        if (isset($this->errors)) {
            $json['errors']     = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
