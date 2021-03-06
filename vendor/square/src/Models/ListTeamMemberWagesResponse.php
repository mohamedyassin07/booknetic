<?php



namespace Square\Models;

/**
 * The response to a request for a set of `TeamMemberWage` objects. Contains
 * a set of `TeamMemberWage`.
 */
class ListTeamMemberWagesResponse implements \JsonSerializable
{
    /**
     * @var TeamMemberWage[]|null
     */
    private $teamMemberWages;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Member Wages.
     *
     * A page of Team Member Wage results.
     *
     * @return TeamMemberWage[]|null
     */
    public function getTeamMemberWages()
    {
        return $this->teamMemberWages;
    }

    /**
     * Sets Team Member Wages.
     *
     * A page of Team Member Wage results.
     *
     * @maps team_member_wages
     *
     * @param TeamMemberWage[]|null $teamMemberWages
     */
    public function setTeamMemberWages(array $teamMemberWages = null)
    {
        $this->teamMemberWages = $teamMemberWages;
    }

    /**
     * Returns Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Team Member Wage results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Team Member Wage results.
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
        if (isset($this->teamMemberWages)) {
            $json['team_member_wages'] = $this->teamMemberWages;
        }
        if (isset($this->cursor)) {
            $json['cursor']            = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']            = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
