<?php



namespace Square\Models;

class RetrieveEmployeeResponse implements \JsonSerializable
{
    /**
     * @var Employee|null
     */
    private $employee;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Employee.
     *
     * An employee object that is used by the external API.
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Sets Employee.
     *
     * An employee object that is used by the external API.
     *
     * @maps employee
     */
    public function setEmployee(Employee $employee = null)
    {
        $this->employee = $employee;
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
        if (isset($this->employee)) {
            $json['employee'] = $this->employee;
        }
        if (isset($this->errors)) {
            $json['errors']   = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
