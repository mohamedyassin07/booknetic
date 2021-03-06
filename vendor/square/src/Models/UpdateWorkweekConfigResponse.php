<?php



namespace Square\Models;

/**
 * The response to a request to update a `WorkweekConfig` object. Contains
 * the updated `WorkweekConfig` object. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class UpdateWorkweekConfigResponse implements \JsonSerializable
{
    /**
     * @var WorkweekConfig|null
     */
    private $workweekConfig;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Workweek Config.
     *
     * Sets the Day of the week and hour of the day that a business starts a
     * work week. Used for the calculation of overtime pay.
     */
    public function getWorkweekConfig()
    {
        return $this->workweekConfig;
    }

    /**
     * Sets Workweek Config.
     *
     * Sets the Day of the week and hour of the day that a business starts a
     * work week. Used for the calculation of overtime pay.
     *
     * @maps workweek_config
     */
    public function setWorkweekConfig(WorkweekConfig $workweekConfig = null)
    {
        $this->workweekConfig = $workweekConfig;
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
        if (isset($this->workweekConfig)) {
            $json['workweek_config'] = $this->workweekConfig;
        }
        if (isset($this->errors)) {
            $json['errors']          = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
