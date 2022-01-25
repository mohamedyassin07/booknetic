<?php



namespace Square\Models;

class DisputeEvidenceCreatedWebhookData implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var DisputeEvidenceCreatedWebhookObject|null
     */
    private $object;

    /**
     * Returns Type.
     *
     * Name of the affected dispute's type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Name of the affected dispute's type.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Id.
     *
     * ID of the affected dispute.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * ID of the affected dispute.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Object.
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets Object.
     *
     * @maps object
     */
    public function setObject(DisputeEvidenceCreatedWebhookObject $object = null)
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
        if (isset($this->type)) {
            $json['type']   = $this->type;
        }
        if (isset($this->id)) {
            $json['id']     = $this->id;
        }
        if (isset($this->object)) {
            $json['object'] = $this->object;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
