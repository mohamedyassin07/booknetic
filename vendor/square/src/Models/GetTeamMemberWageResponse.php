<?php



namespace Square\Models;

/**
 * A response to a request to get a `TeamMemberWage`. Contains
 * the requested `TeamMemberWage` objects. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class GetTeamMemberWageResponse implements \JsonSerializable
{
    /**
     * @var TeamMemberWage|null
     */
    private $teamMemberWage;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Member Wage.
     *
     * The hourly wage rate that a team member will earn on a `Shift` for doing the job
     * specified by the `title` property of this object.
     */
    public function getTeamMemberWage()
    {
        return $this->teamMemberWage;
    }

    /**
     * Sets Team Member Wage.
     *
     * The hourly wage rate that a team member will earn on a `Shift` for doing the job
     * specified by the `title` property of this object.
     *
     * @maps team_member_wage
     */
    public function setTeamMemberWage(TeamMemberWage $teamMemberWage = null)
    {
        $this->teamMemberWage = $teamMemberWage;
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
        if (isset($this->teamMemberWage)) {
            $json['team_member_wage'] = $this->teamMemberWage;
        }
        if (isset($this->errors)) {
            $json['errors']           = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
