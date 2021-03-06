<?php



namespace Square\Models;

/**
 * The hourly wage rate that a team member will earn on a `Shift` for doing the job
 * specified by the `title` property of this object.
 */
class TeamMemberWage implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var Money|null
     */
    private $hourlyRate;

    /**
     * Returns Id.
     *
     * UUID for this object.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * UUID for this object.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Team Member Id.
     *
     * The `Team Member` that this wage is assigned to.
     */
    public function getTeamMemberId()
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The `Team Member` that this wage is assigned to.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId($teamMemberId = null)
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Title.
     *
     * The job title that this wage relates to.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets Title.
     *
     * The job title that this wage relates to.
     *
     * @maps title
     */
    public function setTitle($title = null)
    {
        $this->title = $title;
    }

    /**
     * Returns Hourly Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getHourlyRate()
    {
        return $this->hourlyRate;
    }

    /**
     * Sets Hourly Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps hourly_rate
     */
    public function setHourlyRate(Money $hourlyRate = null)
    {
        $this->hourlyRate = $hourlyRate;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']             = $this->id;
        }
        if (isset($this->teamMemberId)) {
            $json['team_member_id'] = $this->teamMemberId;
        }
        if (isset($this->title)) {
            $json['title']          = $this->title;
        }
        if (isset($this->hourlyRate)) {
            $json['hourly_rate']    = $this->hourlyRate;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
