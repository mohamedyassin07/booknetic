<?php



namespace Square\Models;

/**
 * Defines the parameters for a `DeprecatedCreateDisputeEvidenceText` request.
 */
class DeprecatedCreateDisputeEvidenceTextRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var string|null
     */
    private $evidenceType;

    /**
     * @var string
     */
    private $evidenceText;

    /**
     * @param $idempotencyKey
     * @param $evidenceText
     */
    public function __construct($idempotencyKey, $evidenceText)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->evidenceText = $evidenceText;
    }

    /**
     * Returns Idempotency Key.
     *
     * The Unique ID. For more information, see [Idempotency](https://developer.squareup.com/docs/working-
     * with-apis/idempotency).
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * The Unique ID. For more information, see [Idempotency](https://developer.squareup.com/docs/working-
     * with-apis/idempotency).
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Evidence Type.
     *
     * The type of the dispute evidence.
     */
    public function getEvidenceType()
    {
        return $this->evidenceType;
    }

    /**
     * Sets Evidence Type.
     *
     * The type of the dispute evidence.
     *
     * @maps evidence_type
     */
    public function setEvidenceType($evidenceType = null)
    {
        $this->evidenceType = $evidenceType;
    }

    /**
     * Returns Evidence Text.
     *
     * The evidence string.
     */
    public function getEvidenceText()
    {
        return $this->evidenceText;
    }

    /**
     * Sets Evidence Text.
     *
     * The evidence string.
     *
     * @required
     * @maps evidence_text
     */
    public function setEvidenceText($evidenceText)
    {
        $this->evidenceText = $evidenceText;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key']   = $this->idempotencyKey;
        if (isset($this->evidenceType)) {
            $json['evidence_type'] = $this->evidenceType;
        }
        $json['evidence_text']     = $this->evidenceText;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
