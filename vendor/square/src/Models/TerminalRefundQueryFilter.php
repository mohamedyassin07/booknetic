<?php



namespace Square\Models;

class TerminalRefundQueryFilter implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var TimeRange|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Device Id.
     *
     * `TerminalRefund` objects associated with a specific device. If no device is specified, then all
     * `TerminalRefund` objects for the signed-in account are displayed.
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * `TerminalRefund` objects associated with a specific device. If no device is specified, then all
     * `TerminalRefund` objects for the signed-in account are displayed.
     *
     * @maps device_id
     */
    public function setDeviceId($deviceId = null)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Created At.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     *
     * @maps created_at
     */
    public function setCreatedAt(TimeRange $createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Status.
     *
     * Filtered results with the desired status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, or `COMPLETED`.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Filtered results with the desired status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, or `COMPLETED`.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->deviceId)) {
            $json['device_id']  = $this->deviceId;
        }
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }
        if (isset($this->status)) {
            $json['status']     = $this->status;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
