<?php



namespace Square\Models;

/**
 * Describes when the loyalty program expires.
 */
class LoyaltyProgramExpirationPolicy implements \JsonSerializable
{
    /**
     * @var string
     */
    private $expirationDuration;

    /**
     * @param $expirationDuration
     */
    public function __construct($expirationDuration)
    {
        $this->expirationDuration = $expirationDuration;
    }

    /**
     * Returns Expiration Duration.
     *
     * The number of months before points expire, in RFC 3339 duration format. For example, a value of
     * `P12M` represents a duration of 12 months.
     */
    public function getExpirationDuration()
    {
        return $this->expirationDuration;
    }

    /**
     * Sets Expiration Duration.
     *
     * The number of months before points expire, in RFC 3339 duration format. For example, a value of
     * `P12M` represents a duration of 12 months.
     *
     * @required
     * @maps expiration_duration
     */
    public function setExpirationDuration($expirationDuration)
    {
        $this->expirationDuration = $expirationDuration;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['expiration_duration'] = $this->expirationDuration;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
