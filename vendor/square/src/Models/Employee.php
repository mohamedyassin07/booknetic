<?php



namespace Square\Models;

/**
 * An employee object that is used by the external API.
 */
class Employee implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var bool|null
     */
    private $isOwner;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * Returns Id.
     *
     * UUID for this object.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * UUID for this object.
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
     * @maps first_name
     */
    public function setFirstName($firstName = null)
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
     * @maps last_name
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns Email.
     *
     * The employee's email address
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets Email.
     *
     * The employee's email address
     *
     * @maps email
     */
    public function setEmail($email = null)
    {
        $this->email = $email;
    }

    /**
     * Returns Phone Number.
     *
     * The employee's phone number in E.164 format, i.e. "+12125554250"
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The employee's phone number in E.164 format, i.e. "+12125554250"
     *
     * @maps phone_number
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Location Ids.
     *
     * A list of location IDs where this employee has access to.
     *
     * @return string[]|null
     */
    public function getLocationIds()
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * A list of location IDs where this employee has access to.
     *
     * @maps location_ids
     *
     * @param string[]|null $locationIds
     */
    public function setLocationIds(array $locationIds = null)
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Status.
     *
     * The status of the Employee being retrieved.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the Employee being retrieved.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Is Owner.
     *
     * Whether this employee is the owner of the merchant. Each merchant
     * has one owner employee, and that employee has full authority over
     * the account.
     */
    public function getIsOwner()
    {
        return $this->isOwner;
    }

    /**
     * Sets Is Owner.
     *
     * Whether this employee is the owner of the merchant. Each merchant
     * has one owner employee, and that employee has full authority over
     * the account.
     *
     * @maps is_owner
     */
    public function setIsOwner($isOwner = null)
    {
        $this->isOwner = $isOwner;
    }

    /**
     * Returns Created At.
     *
     * A read-only timestamp in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * A read-only timestamp in RFC 3339 format.
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
     * A read-only timestamp in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * A read-only timestamp in RFC 3339 format.
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
            $json['id']           = $this->id;
        }
        if (isset($this->firstName)) {
            $json['first_name']   = $this->firstName;
        }
        if (isset($this->lastName)) {
            $json['last_name']    = $this->lastName;
        }
        if (isset($this->email)) {
            $json['email']        = $this->email;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number'] = $this->phoneNumber;
        }
        if (isset($this->locationIds)) {
            $json['location_ids'] = $this->locationIds;
        }
        if (isset($this->status)) {
            $json['status']       = $this->status;
        }
        if (isset($this->isOwner)) {
            $json['is_owner']     = $this->isOwner;
        }
        if (isset($this->createdAt)) {
            $json['created_at']   = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']   = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
