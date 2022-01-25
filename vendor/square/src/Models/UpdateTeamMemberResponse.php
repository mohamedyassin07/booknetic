<?php



namespace Square\Models;

/**
 * Represents a response from an update request containing the updated `TeamMember` object or error
 * messages.
 */
class UpdateTeamMemberResponse implements \JsonSerializable
{
    /**
     * @var TeamMember|null
     */
    private $teamMember;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Member.
     *
     * A record representing an individual team member for a business.
     */
    public function getTeamMember()
    {
        return $this->teamMember;
    }

    /**
     * Sets Team Member.
     *
     * A record representing an individual team member for a business.
     *
     * @maps team_member
     */
    public function setTeamMember(TeamMember $teamMember = null)
    {
        $this->teamMember = $teamMember;
    }

    /**
     * Returns Errors.
     *
     * The errors that occurred during the request.
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
     * The errors that occurred during the request.
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
        if (isset($this->teamMember)) {
            $json['team_member'] = $this->teamMember;
        }
        if (isset($this->errors)) {
            $json['errors']      = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
