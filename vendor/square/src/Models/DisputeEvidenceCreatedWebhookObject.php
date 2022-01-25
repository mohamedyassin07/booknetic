<?php



namespace Square\Models;

class DisputeEvidenceCreatedWebhookObject implements \JsonSerializable
{
    /**
     * @var Dispute|null
     */
    private $object;

    /**
     * Returns Object.
     *
     * Represents a dispute a cardholder initiated with their bank.
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets Object.
     *
     * Represents a dispute a cardholder initiated with their bank.
     *
     * @maps object
     */
    public function setObject(Dispute $object = null)
    {
        $this->object = $object;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->object)) {
            $json['object'] = $this->object;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
