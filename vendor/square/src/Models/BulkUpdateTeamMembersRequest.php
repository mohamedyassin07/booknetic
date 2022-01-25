<?php



namespace Square\Models;

/**
 * Represents a bulk update request for `TeamMember` objects.
 */
class BulkUpdateTeamMembersRequest implements \JsonSerializable
{
    /**
     * @var array
     */
    private $teamMembers;

    /**
     * @param array $teamMembers
     */
    public function __construct(array $teamMembers)
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * Returns Team Members.
     *
     * The data used to update the `TeamMember` objects. Each key is the `team_member_id` that maps to the
     * `UpdateTeamMemberRequest`.
     */
    public function getTeamMembers()
    {
        return $this->teamMembers;
    }

    /**
     * Sets Team Members.
     *
     * The data used to update the `TeamMember` objects. Each key is the `team_member_id` that maps to the
     * `UpdateTeamMemberRequest`.
     *
     * @required
     * @maps team_members
     */
    public function setTeamMembers(array $teamMembers)
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['team_members'] = $this->teamMembers;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
