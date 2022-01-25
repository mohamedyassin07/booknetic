<?php



namespace Square\Models;

class CancelTerminalRefundResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var TerminalRefund|null
     */
    private $refund;

    /**
     * Returns Errors.
     *
     * Information about errors encountered during the request.
     *
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Information about errors encountered during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
    }

    /**
     * Returns Refund.
     */
    public function getRefund()
    {
        return $this->refund;
    }

    /**
     * Sets Refund.
     *
     * @maps refund
     */
    public function setRefund(TerminalRefund $refund = null)
    {
        $this->refund = $refund;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->refund)) {
            $json['refund'] = $this->refund;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
