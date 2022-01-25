<?php



namespace Square\Models;

/**
 * Provides information about the subscription event.
 */
class SubscriptionEventInfo implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $detail;

    /**
     * @var string|null
     */
    private $code;

    /**
     * Returns Detail.
     *
     * A human-readable explanation for the event.
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Sets Detail.
     *
     * A human-readable explanation for the event.
     *
     * @maps detail
     */
    public function setDetail($detail = null)
    {
        $this->detail = $detail;
    }

    /**
     * Returns Code.
     *
     * The possible subscription event info codes.
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * The possible subscription event info codes.
     *
     * @maps code
     */
    public function setCode($code = null)
    {
        $this->code = $code;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->detail)) {
            $json['detail'] = $this->detail;
        }
        if (isset($this->code)) {
            $json['code']   = $this->code;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
