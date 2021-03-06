<?php



namespace Square\Models;

/**
 * Defines the fields in a `RetrieveDisputeEvidence` response.
 */
class RetrieveDisputeEvidenceResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var DisputeEvidence|null
     */
    private $evidence;

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
     * Returns Evidence.
     */
    public function getEvidence()
    {
        return $this->evidence;
    }

    /**
     * Sets Evidence.
     *
     * @maps evidence
     */
    public function setEvidence(DisputeEvidence $evidence = null)
    {
        $this->evidence = $evidence;
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
            $json['errors']   = $this->errors;
        }
        if (isset($this->evidence)) {
            $json['evidence'] = $this->evidence;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
