<?php



namespace Square\Models;

/**
 * A request for a set of `EmployeeWage` objects
 */
class ListEmployeeWagesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Employee Id.
     *
     * Filter wages returned to only those that are associated with the specified employee.
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * Filter wages returned to only those that are associated with the specified employee.
     *
     * @maps employee_id
     */
    public function setEmployeeId($employeeId = null)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Limit.
     *
     * Maximum number of Employee Wages to return per page. Can range between
     * 1 and 200. The default is the maximum at 200.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Maximum number of Employee Wages to return per page. Can range between
     * 1 and 200. The default is the maximum at 200.
     *
     * @maps limit
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * Pointer to the next page of Employee Wage results to fetch.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Pointer to the next page of Employee Wage results to fetch.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->employeeId)) {
            $json['employee_id'] = $this->employeeId;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
