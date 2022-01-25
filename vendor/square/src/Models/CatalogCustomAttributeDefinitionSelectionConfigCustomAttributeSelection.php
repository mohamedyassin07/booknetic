<?php



namespace Square\Models;

/**
 * A named selection for this `SELECTION`-type custom attribute definition.
 */
class CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $uid;

    /**
     * @var string
     */
    private $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Returns Uid.
     *
     * Unique ID set by Square.
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets Uid.
     *
     * Unique ID set by Square.
     *
     * @maps uid
     */
    public function setUid($uid = null)
    {
        $this->uid = $uid;
    }

    /**
     * Returns Name.
     *
     * Selection name, unique within `allowed_selections`.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * Selection name, unique within `allowed_selections`.
     *
     * @required
     * @maps name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->uid)) {
            $json['uid'] = $this->uid;
        }
        $json['name']    = $this->name;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
