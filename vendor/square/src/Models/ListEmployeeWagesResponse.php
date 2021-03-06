<?php



namespace Square\Models;

/**
 * The response to a request for a set of `EmployeeWage` objects. Contains
 * a set of `EmployeeWage`.
 */
class ListEmployeeWagesResponse implements \JsonSerializable
{
    /**
     * @var EmployeeWage[]|null
     */
    private $employeeWages;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Employee Wages.
     *
     * A page of Employee Wage results.
     *
     * @return EmployeeWage[]|null
     */
    public function getEmployeeWages()
    {
        return $this->employeeWages;
    }

    /**
     * Sets Employee Wages.
     *
     * A page of Employee Wage results.
     *
     * @maps employee_wages
     *
     * @param EmployeeWage[]|null $employeeWages
     */
    public function setEmployeeWages(array $employeeWages = null)
    {
        $this->employeeWages = $employeeWages;
    }

    /**
     * Returns Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Employee Wage results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Employee Wage results.
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
        if (isset($this->employeeWages)) {
            $json['employee_wages'] = $this->employeeWages;
        }
        if (isset($this->cursor)) {
            $json['cursor']         = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']         = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
