<?php



namespace Square\Models;

/**
 * Represents a bulk create request for `TeamMember` objects.
 */
class BulkCreateTeamMembersRequest implements \JsonSerializable
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
     * The data used to create the `TeamMember` objects. Each key is the `idempotency_key` that maps to the
     * `CreateTeamMemberRequest`.
     */
    public function getTeamMembers()
    {
        return $this->teamMembers;
    }

    /**
     * Sets Team Members.
     *
     * The data used to create the `TeamMember` objects. Each key is the `idempotency_key` that maps to the
     * `CreateTeamMemberRequest`.
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
