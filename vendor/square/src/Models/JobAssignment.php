<?php



namespace Square\Models;

/**
 * An object describing a job that a team member is assigned to.
 */
class JobAssignment implements \JsonSerializable
{
    /**
     * @var string
     */
    private $jobTitle;

    /**
     * @var string
     */
    private $payType;

    /**
     * @var Money|null
     */
    private $hourlyRate;

    /**
     * @var Money|null
     */
    private $annualRate;

    /**
     * @var int|null
     */
    private $weeklyHours;

    /**
     * @param $jobTitle
     * @param $payType
     */
    public function __construct($jobTitle, $payType)
    {
        $this->jobTitle = $jobTitle;
        $this->payType = $payType;
    }

    /**
     * Returns Job Title.
     *
     * The title of the job.
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * Sets Job Title.
     *
     * The title of the job.
     *
     * @required
     * @maps job_title
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * Returns Pay Type.
     *
     * Enumerates the possible pay types that a job can be assigned.
     */
    public function getPayType()
    {
        return $this->payType;
    }

    /**
     * Sets Pay Type.
     *
     * Enumerates the possible pay types that a job can be assigned.
     *
     * @required
     * @maps pay_type
     */
    public function setPayType($payType)
    {
        $this->payType = $payType;
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
     * Returns Annual Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAnnualRate()
    {
        return $this->annualRate;
    }

    /**
     * Sets Annual Rate.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps annual_rate
     */
    public function setAnnualRate(Money $annualRate = null)
    {
        $this->annualRate = $annualRate;
    }

    /**
     * Returns Weekly Hours.
     *
     * The planned hours per week for the job. Set if the job `PayType` is `SALARY`.
     */
    public function getWeeklyHours()
    {
        return $this->weeklyHours;
    }

    /**
     * Sets Weekly Hours.
     *
     * The planned hours per week for the job. Set if the job `PayType` is `SALARY`.
     *
     * @maps weekly_hours
     */
    public function setWeeklyHours($weeklyHours = null)
    {
        $this->weeklyHours = $weeklyHours;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['job_title']        = $this->jobTitle;
        $json['pay_type']         = $this->payType;
        if (isset($this->hourlyRate)) {
            $json['hourly_rate']  = $this->hourlyRate;
        }
        if (isset($this->annualRate)) {
            $json['annual_rate']  = $this->annualRate;
        }
        if (isset($this->weeklyHours)) {
            $json['weekly_hours'] = $this->weeklyHours;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
