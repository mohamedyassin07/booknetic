<?php



namespace Square\Models;

/**
 * Describes a gift card activity of the BLOCK type.
 */
class GiftCardActivityBlock implements \JsonSerializable
{
    /**
     * @var string
     */
    private $reason;

    /**
     * @param $reason
     */
    public function __construct($reason)
    {
        $this->reason = $reason;
    }

    /**
     * Returns Reason.
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * @required
     * @maps reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['reason'] = $this->reason;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
