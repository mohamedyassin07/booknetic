<?php



namespace Square\Models;

class Device implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * Returns Id.
     *
     * The device's Square-issued ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The device's Square-issued ID.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The device's merchant-specified name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The device's merchant-specified name.
     *
     * @maps name
     */
    public function setName($name = null)
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
        if (isset($this->id)) {
            $json['id']   = $this->id;
        }
        if (isset($this->name)) {
            $json['name'] = $this->name;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
