<?php



namespace Square\Models;

/**
 * A request for a set of `TeamMemberWage` objects
 */
class ListTeamMemberWagesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Team Member Id.
     *
     * Filter wages returned to only those that are associated with the
     * specified team member.
     */
    public function getTeamMemberId()
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * Filter wages returned to only those that are associated with the
     * specified team member.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId($teamMemberId = null)
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Limit.
     *
     * Maximum number of Team Member Wages to return per page. Can range between
     * 1 and 200. The default is the maximum at 200.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Maximum number of Team Member Wages to return per page. Can range between
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
        if (isset($this->teamMemberId)) {
            $json['team_member_id'] = $this->teamMemberId;
        }
        if (isset($this->limit)) {
            $json['limit']          = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']         = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
