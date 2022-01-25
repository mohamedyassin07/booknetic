<?php



namespace Square\Utils;

/**
 * Wraps file with mime-type and filename to be sent as part of an HTTP request.
 */
class FileWrapper
{
    /**
     * @var string
     */
    private $realFilePath;

    /**
     * @var string|null
     */
    private $mimeType;

    /**
     * @var string|null
     */
    private $filename;

    /**
     * Create FileWrapper instance from a file on disk
     */
    public static function createFromPath($realFilePath, $mimeType = null, $filename = '')
    {
        return new self($realFilePath, $mimeType, $filename);
    }

    private function __construct($realFilePath, $mimeType = null, $filename = null)
    {
        $this->realFilePath = $realFilePath;
        $this->mimeType = $mimeType;
        $this->filename = $filename;
    }

    /**
     * Get mime-type to be sent with the file
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Get name of the file to be used in the upload data
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Internal method: Do not use directly!
     */
    public function createCurlFileInstance($defaultMimeType)
    {
        $mimeType = isset( $this->mimeType ) ? $this->mimeType : $defaultMimeType;
        return new \CURLFile($this->realFilePath, $mimeType, $this->filename);
    }
}
