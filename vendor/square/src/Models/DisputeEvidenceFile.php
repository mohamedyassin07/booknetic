<?php



namespace Square\Models;

/**
 * A file to be uploaded as dispute evidence.
 */
class DisputeEvidenceFile implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $filename;

    /**
     * @var string|null
     */
    private $filetype;

    /**
     * Returns Filename.
     *
     * The file name including the file extension. For example: "receipt.tiff".
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Sets Filename.
     *
     * The file name including the file extension. For example: "receipt.tiff".
     *
     * @maps filename
     */
    public function setFilename($filename = null)
    {
        $this->filename = $filename;
    }

    /**
     * Returns Filetype.
     *
     * Dispute evidence files must be application/pdf, image/heic, image/heif, image/jpeg, image/png, or
     * image/tiff formats.
     */
    public function getFiletype()
    {
        return $this->filetype;
    }

    /**
     * Sets Filetype.
     *
     * Dispute evidence files must be application/pdf, image/heic, image/heif, image/jpeg, image/png, or
     * image/tiff formats.
     *
     * @maps filetype
     */
    public function setFiletype($filetype = null)
    {
        $this->filetype = $filetype;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->filename)) {
            $json['filename'] = $this->filename;
        }
        if (isset($this->filetype)) {
            $json['filetype'] = $this->filetype;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
