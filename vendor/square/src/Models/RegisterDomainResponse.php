<?php



namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [RegisterDomain]($e/ApplePay/RegisterDomain) endpoint.
 *
 * Either `errors` or `status` are present in a given response (never both).
 */
class RegisterDomainResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
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
     * Any errors that occurred during the request.
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
     * Returns Status.
     *
     * The status of the domain registration.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the domain registration.
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
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->status)) {
            $json['status'] = $this->status;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
