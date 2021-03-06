<?php



namespace Square\Models;

/**
 * Defines the parameters for a `CreateDisputeEvidenceFile` request.
 */
class CreateDisputeEvidenceFileRequest implements \JsonSerializable
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
     * @var string|null
     */
    private $contentType;

    /**
     * @param $idempotencyKey
     */
    public function __construct($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
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
     * Returns Content Type.
     *
     * The MIME type of the uploaded file.
     * The type can be image/heic, image/heif, image/jpeg, application/pdf, image/png, or image/tiff.
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Sets Content Type.
     *
     * The MIME type of the uploaded file.
     * The type can be image/heic, image/heif, image/jpeg, application/pdf, image/png, or image/tiff.
     *
     * @maps content_type
     */
    public function setContentType($contentType = null)
    {
        $this->contentType = $contentType;
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
        if (isset($this->contentType)) {
            $json['content_type']  = $this->contentType;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
