<?php



namespace Square\Models;

/**
 * The booking profile of a seller's team member, including the team member's ID, display name,
 * description and whether the team member can be booked as a service provider.
 */
class TeamMemberBookingProfile implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * @var bool|null
     */
    private $isBookable;

    /**
     * @var string|null
     */
    private $profileImageUrl;

    /**
     * Returns Team Member Id.
     *
     * The ID of the [TeamMember]($m/TeamMember) object for the team member associated with the booking
     * profile.
     */
    public function getTeamMemberId()
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The ID of the [TeamMember]($m/TeamMember) object for the team member associated with the booking
     * profile.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId($teamMemberId = null)
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Description.
     *
     * The description of the team member.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the team member.
     *
     * @maps description
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
    }

    /**
     * Returns Display Name.
     *
     * The display name of the team member.
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Sets Display Name.
     *
     * The display name of the team member.
     *
     * @maps display_name
     */
    public function setDisplayName($displayName = null)
    {
        $this->displayName = $displayName;
    }

    /**
     * Returns Is Bookable.
     *
     * Indicates whether the team member can be booked through the Bookings API or the seller's online
     * booking channel or site (`true) or not (`false`).
     */
    public function getIsBookable()
    {
        return $this->isBookable;
    }

    /**
     * Sets Is Bookable.
     *
     * Indicates whether the team member can be booked through the Bookings API or the seller's online
     * booking channel or site (`true) or not (`false`).
     *
     * @maps is_bookable
     */
    public function setIsBookable($isBookable = null)
    {
        $this->isBookable = $isBookable;
    }

    /**
     * Returns Profile Image Url.
     *
     * The URL of the team member's image for the bookings profile.
     */
    public function getProfileImageUrl()
    {
        return $this->profileImageUrl;
    }

    /**
     * Sets Profile Image Url.
     *
     * The URL of the team member's image for the bookings profile.
     *
     * @maps profile_image_url
     */
    public function setProfileImageUrl($profileImageUrl = null)
    {
        $this->profileImageUrl = $profileImageUrl;
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
            $json['team_member_id']    = $this->teamMemberId;
        }
        if (isset($this->description)) {
            $json['description']       = $this->description;
        }
        if (isset($this->displayName)) {
            $json['display_name']      = $this->displayName;
        }
        if (isset($this->isBookable)) {
            $json['is_bookable']       = $this->isBookable;
        }
        if (isset($this->profileImageUrl)) {
            $json['profile_image_url'] = $this->profileImageUrl;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
