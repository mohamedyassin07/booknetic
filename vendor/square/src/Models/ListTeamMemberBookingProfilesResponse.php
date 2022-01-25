<?php



namespace Square\Models;

class ListTeamMemberBookingProfilesResponse implements \JsonSerializable
{
    /**
     * @var TeamMemberBookingProfile[]|null
     */
    private $teamMemberBookingProfiles;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Member Booking Profiles.
     *
     * The list of team member booking profiles.
     *
     * @return TeamMemberBookingProfile[]|null
     */
    public function getTeamMemberBookingProfiles()
    {
        return $this->teamMemberBookingProfiles;
    }

    /**
     * Sets Team Member Booking Profiles.
     *
     * The list of team member booking profiles.
     *
     * @maps team_member_booking_profiles
     *
     * @param TeamMemberBookingProfile[]|null $teamMemberBookingProfiles
     */
    public function setTeamMemberBookingProfiles(array $teamMemberBookingProfiles = null)
    {
        $this->teamMemberBookingProfiles = $teamMemberBookingProfiles;
    }

    /**
     * Returns Cursor.
     *
     * The cursor for paginating through the results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The cursor for paginating through the results.
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
        if (isset($this->teamMemberBookingProfiles)) {
            $json['team_member_booking_profiles'] = $this->teamMemberBookingProfiles;
        }
        if (isset($this->cursor)) {
            $json['cursor']                       = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']                       = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
