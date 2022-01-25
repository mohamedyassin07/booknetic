<?php



namespace Square\Models;

class DeleteCatalogObjectResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var string[]|null
     */
    private $deletedObjectIds;

    /**
     * @var string|null
     */
    private $deletedAt;

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
     * Returns Deleted Object Ids.
     *
     * The IDs of all catalog objects deleted by this request.
     * Multiple IDs may be returned when associated objects are also deleted, for example
     * a catalog item variation will be deleted (and its ID included in this field)
     * when its parent catalog item is deleted.
     *
     * @return string[]|null
     */
    public function getDeletedObjectIds()
    {
        return $this->deletedObjectIds;
    }

    /**
     * Sets Deleted Object Ids.
     *
     * The IDs of all catalog objects deleted by this request.
     * Multiple IDs may be returned when associated objects are also deleted, for example
     * a catalog item variation will be deleted (and its ID included in this field)
     * when its parent catalog item is deleted.
     *
     * @maps deleted_object_ids
     *
     * @param string[]|null $deletedObjectIds
     */
    public function setDeletedObjectIds(array $deletedObjectIds = null)
    {
        $this->deletedObjectIds = $deletedObjectIds;
    }

    /**
     * Returns Deleted At.
     *
     * The database [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * of this deletion in RFC 3339 format, e.g., `2016-09-04T23:59:33.123Z`.
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Sets Deleted At.
     *
     * The database [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * of this deletion in RFC 3339 format, e.g., `2016-09-04T23:59:33.123Z`.
     *
     * @maps deleted_at
     */
    public function setDeletedAt($deletedAt = null)
    {
        $this->deletedAt = $deletedAt;
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
            $json['errors']             = $this->errors;
        }
        if (isset($this->deletedObjectIds)) {
            $json['deleted_object_ids'] = $this->deletedObjectIds;
        }
        if (isset($this->deletedAt)) {
            $json['deleted_at']         = $this->deletedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}