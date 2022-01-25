<?php



namespace Square\Models;

/**
 * Represents a response from a search request containing a filtered list of `TeamMember` objects.
 */
class SearchTeamMembersResponse implements \JsonSerializable
{
    /**
     * @var TeamMember[]|null
     */
    private $teamMembers;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Members.
     *
     * The filtered list of `TeamMember` objects.
     *
     * @return TeamMember[]|null
     */
    public function getTeamMembers()
    {
        return $this->teamMembers;
    }

    /**
     * Sets Team Members.
     *
     * The filtered list of `TeamMember` objects.
     *
     * @maps team_members
     *
     * @param TeamMember[]|null $teamMembers
     */
    public function setTeamMembers(array $teamMembers = null)
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * Returns Cursor.
     *
     * The opaque cursor for fetching the next page. For more information, see
     * [pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The opaque cursor for fetching the next page. For more information, see
     * [pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
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
        if (isset($this->teamMembers)) {
            $json['team_members'] = $this->teamMembers;
        }
        if (isset($this->cursor)) {
            $json['cursor']       = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']       = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
