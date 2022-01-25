<?php



namespace Square\Models;

class RetrieveTeamMemberBookingProfileResponse implements \JsonSerializable
{
    /**
     * @var TeamMemberBookingProfile|null
     */
    private $teamMemberBookingProfile;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Team Member Booking Profile.
     *
     * The booking profile of a seller's team member, including the team member's ID, display name,
     * description and whether the team member can be booked as a service provider.
     */
    public function getTeamMemberBookingProfile()
    {
        return $this->teamMemberBookingProfile;
    }

    /**
     * Sets Team Member Booking Profile.
     *
     * The booking profile of a seller's team member, including the team member's ID, display name,
     * description and whether the team member can be booked as a service provider.
     *
     * @maps team_member_booking_profile
     */
    public function setTeamMemberBookingProfile(TeamMemberBookingProfile $teamMemberBookingProfile = null)
    {
        $this->teamMemberBookingProfile = $teamMemberBookingProfile;
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
        if (isset($this->teamMemberBookingProfile)) {
            $json['team_member_booking_profile'] = $this->teamMemberBookingProfile;
        }
        if (isset($this->errors)) {
            $json['errors']                      = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
