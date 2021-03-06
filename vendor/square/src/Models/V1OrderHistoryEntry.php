<?php



namespace Square\Models;

/**
 * V1OrderHistoryEntry
 */
class V1OrderHistoryEntry implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $action;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * Returns Action.
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets Action.
     *
     * @maps action
     */
    public function setAction($action = null)
    {
        $this->action = $action;
    }

    /**
     * Returns Created At.
     *
     * The time when the action was performed, in ISO 8601 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the action was performed, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->action)) {
            $json['action']     = $this->action;
        }
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
