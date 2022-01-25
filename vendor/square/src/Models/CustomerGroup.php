<?php



namespace Square\Models;

/**
 * Represents a group of customer profiles.
 *
 * Customer groups can be created, be modified, and have their membership defined using
 * the Customers API or within the Customer Directory in the Square Seller Dashboard or Point of Sale.
 */
class CustomerGroup implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Returns Id.
     *
     * A unique Square-generated ID for the customer group.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique Square-generated ID for the customer group.
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
     * The name of the customer group.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the customer group.
     *
     * @required
     * @maps name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the customer group was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the customer group was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp when the customer group was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp when the customer group was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
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
            $json['id']         = $this->id;
        }
        $json['name']           = $this->name;
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at'] = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
