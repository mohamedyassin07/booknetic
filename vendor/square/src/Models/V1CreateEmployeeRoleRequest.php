<?php



namespace Square\Models;

class V1CreateEmployeeRoleRequest implements \JsonSerializable
{
    /**
     * @var V1EmployeeRole|null
     */
    private $employeeRole;

    /**
     * Returns Employee Role.
     *
     * V1EmployeeRole
     */
    public function getEmployeeRole()
    {
        return $this->employeeRole;
    }

    /**
     * Sets Employee Role.
     *
     * V1EmployeeRole
     *
     * @maps employee_role
     */
    public function setEmployeeRole(V1EmployeeRole $employeeRole = null)
    {
        $this->employeeRole = $employeeRole;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->employeeRole)) {
            $json['employee_role'] = $this->employeeRole;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
