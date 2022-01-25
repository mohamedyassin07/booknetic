<?php



namespace Square\Models;

class BatchRetrieveCatalogObjectsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CatalogObject[]|null
     */
    private $objects;

    /**
     * @var CatalogObject[]|null
     */
    private $relatedObjects;

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
     * Returns Objects.
     *
     * A list of [CatalogObject]($m/CatalogObject)s returned.
     *
     * @return CatalogObject[]|null
     */
    public function getObjects()
    {
        return $this->objects;
    }

    /**
     * Sets Objects.
     *
     * A list of [CatalogObject]($m/CatalogObject)s returned.
     *
     * @maps objects
     *
     * @param CatalogObject[]|null $objects
     */
    public function setObjects(array $objects = null)
    {
        $this->objects = $objects;
    }

    /**
     * Returns Related Objects.
     *
     * A list of [CatalogObject]($m/CatalogObject)s referenced by the object in the `objects` field.
     *
     * @return CatalogObject[]|null
     */
    public function getRelatedObjects()
    {
        return $this->relatedObjects;
    }

    /**
     * Sets Related Objects.
     *
     * A list of [CatalogObject]($m/CatalogObject)s referenced by the object in the `objects` field.
     *
     * @maps related_objects
     *
     * @param CatalogObject[]|null $relatedObjects
     */
    public function setRelatedObjects(array $relatedObjects = null)
    {
        $this->relatedObjects = $relatedObjects;
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
            $json['errors']          = $this->errors;
        }
        if (isset($this->objects)) {
            $json['objects']         = $this->objects;
        }
        if (isset($this->relatedObjects)) {
            $json['related_objects'] = $this->relatedObjects;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
