<?php



namespace Square\Models;

/**
 * The response to a request for a set of `WorkweekConfig` objects. Contains
 * the requested `WorkweekConfig` objects. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class ListWorkweekConfigsResponse implements \JsonSerializable
{
    /**
     * @var WorkweekConfig[]|null
     */
    private $workweekConfigs;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Workweek Configs.
     *
     * A page of Employee Wage results.
     *
     * @return WorkweekConfig[]|null
     */
    public function getWorkweekConfigs()
    {
        return $this->workweekConfigs;
    }

    /**
     * Sets Workweek Configs.
     *
     * A page of Employee Wage results.
     *
     * @maps workweek_configs
     *
     * @param WorkweekConfig[]|null $workweekConfigs
     */
    public function setWorkweekConfigs(array $workweekConfigs = null)
    {
        $this->workweekConfigs = $workweekConfigs;
    }

    /**
     * Returns Cursor.
     *
     * Value supplied in the subsequent request to fetch the next page of
     * Employee Wage results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Value supplied in the subsequent request to fetch the next page of
     * Employee Wage results.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
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
        if (isset($this->workweekConfigs)) {
            $json['workweek_configs'] = $this->workweekConfigs;
        }
        if (isset($this->cursor)) {
            $json['cursor']           = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']           = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
