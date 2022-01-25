<?php



namespace Square\Models;

/**
 * Represents one of a business's employees.
 */
class V1Employee implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string[]|null
     */
    private $roleIds;

    /**
     * @var string[]|null
     */
    private $authorizedLocationIds;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $externalId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * Returns Id.
     *
     * The employee's unique ID.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The employee's unique ID.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns First Name.
     *
     * The employee's first name.
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets First Name.
     *
     * The employee's first name.
     *
     * @required
     * @maps first_name
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns Last Name.
     *
     * The employee's last name.
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets Last Name.
     *
     * The employee's last name.
     *
     * @required
     * @maps last_name
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns Role Ids.
     *
     * The ids of the employee's associated roles. Currently, you can specify only one or zero roles per
     * employee.
     *
     * @return string[]|null
     */
    public function getRoleIds()
    {
        return $this->roleIds;
    }

    /**
     * Sets Role Ids.
     *
     * The ids of the employee's associated roles. Currently, you can specify only one or zero roles per
     * employee.
     *
     * @maps role_ids
     *
     * @param string[]|null $roleIds
     */
    public function setRoleIds(array $roleIds = null)
    {
        $this->roleIds = $roleIds;
    }

    /**
     * Returns Authorized Location Ids.
     *
     * The IDs of the locations the employee is allowed to clock in at.
     *
     * @return string[]|null
     */
    public function getAuthorizedLocationIds()
    {
        return $this->authorizedLocationIds;
    }

    /**
     * Sets Authorized Location Ids.
     *
     * The IDs of the locations the employee is allowed to clock in at.
     *
     * @maps authorized_location_ids
     *
     * @param string[]|null $authorizedLocationIds
     */
    public function setAuthorizedLocationIds(array $authorizedLocationIds = null)
    {
        $this->authorizedLocationIds = $authorizedLocationIds;
    }

    /**
     * Returns Email.
     *
     * The employee's email address.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets Email.
     *
     * The employee's email address.
     *
     * @maps email
     */
    public function setEmail($email = null)
    {
        $this->email = $email;
    }

    /**
     * Returns Status.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns External Id.
     *
     * An ID the merchant can set to associate the employee with an entity in another system.
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * Sets External Id.
     *
     * An ID the merchant can set to associate the employee with an entity in another system.
     *
     * @maps external_id
     */
    public function setExternalId($externalId = null)
    {
        $this->externalId = $externalId;
    }

    /**
     * Returns Created At.
     *
     * The time when the employee entity was created, in ISO 8601 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the employee entity was created, in ISO 8601 format.
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
     * The time when the employee entity was most recently updated, in ISO 8601 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the employee entity was most recently updated, in ISO 8601 format.
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
            $json['id']                      = $this->id;
        }
        $json['first_name']                  = $this->firstName;
        $json['last_name']                   = $this->lastName;
        if (isset($this->roleIds)) {
            $json['role_ids']                = $this->roleIds;
        }
        if (isset($this->authorizedLocationIds)) {
            $json['authorized_location_ids'] = $this->authorizedLocationIds;
        }
        if (isset($this->email)) {
            $json['email']                   = $this->email;
        }
        if (isset($this->status)) {
            $json['status']                  = $this->status;
        }
        if (isset($this->externalId)) {
            $json['external_id']             = $this->externalId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']              = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']              = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
