<?php



namespace Square\Models;

class ListEmployeesResponse implements \JsonSerializable
{
    /**
     * @var Employee[]|null
     */
    private $employees;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Employees.
     *
     * @return Employee[]|null
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Sets Employees.
     *
     * @maps employees
     *
     * @param Employee[]|null $employees
     */
    public function setEmployees(array $employees = null)
    {
        $this->employees = $employees;
    }

    /**
     * Returns Cursor.
     *
     * The token to be used to retrieve the next page of results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The token to be used to retrieve the next page of results.
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
        if (isset($this->employees)) {
            $json['employees'] = $this->employees;
        }
        if (isset($this->cursor)) {
            $json['cursor']    = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']    = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
