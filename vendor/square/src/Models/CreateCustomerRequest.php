<?php



namespace Square\Models;

/**
 * Defines the body parameters that can be included in a request to the
 * `CreateCustomer` endpoint.
 */
class CreateCustomerRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var string|null
     */
    private $givenName;

    /**
     * @var string|null
     */
    private $familyName;

    /**
     * @var string|null
     */
    private $companyName;

    /**
     * @var string|null
     */
    private $nickname;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var Address|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $birthday;

    /**
     * Returns Idempotency Key.
     *
     * The idempotency key for the request. For more information, see
     * [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * The idempotency key for the request. For more information, see
     * [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey = null)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Given Name.
     *
     * The given name (that is, the first name) associated with the customer profile.
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     *
     * The given name (that is, the first name) associated with the customer profile.
     *
     * @maps given_name
     */
    public function setGivenName($givenName = null)
    {
        $this->givenName = $givenName;
    }

    /**
     * Returns Family Name.
     *
     * The family name (that is, the last name) associated with the customer profile.
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     *
     * The family name (that is, the last name) associated with the customer profile.
     *
     * @maps family_name
     */
    public function setFamilyName($familyName = null)
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns Company Name.
     *
     * A business name associated with the customer profile.
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Sets Company Name.
     *
     * A business name associated with the customer profile.
     *
     * @maps company_name
     */
    public function setCompanyName($companyName = null)
    {
        $this->companyName = $companyName;
    }

    /**
     * Returns Nickname.
     *
     * A nickname for the customer profile.
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Sets Nickname.
     *
     * A nickname for the customer profile.
     *
     * @maps nickname
     */
    public function setNickname($nickname = null)
    {
        $this->nickname = $nickname;
    }

    /**
     * Returns Email Address.
     *
     * The email address associated with the customer profile.
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The email address associated with the customer profile.
     *
     * @maps email_address
     */
    public function setEmailAddress($emailAddress = null)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns Address.
     *
     * Represents a physical address.
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a physical address.
     *
     * @maps address
     */
    public function setAddress(Address $address = null)
    {
        $this->address = $address;
    }

    /**
     * Returns Phone Number.
     *
     * The 11-digit phone number associated with the customer profile.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The 11-digit phone number associated with the customer profile.
     *
     * @maps phone_number
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Reference Id.
     *
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional second ID used to associate the customer profile with an
     * entity in another system.
     *
     * @maps reference_id
     */
    public function setReferenceId($referenceId = null)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Note.
     *
     * A custom note associated with the customer profile.
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * A custom note associated with the customer profile.
     *
     * @maps note
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * Returns Birthday.
     *
     * The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The
     * timezone and time are not allowed.
     * For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:
     * 00-00:00` represents a birthday on September 21, 1998.
     * You can also specify this value in `YYYY-MM-DD` format.
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Sets Birthday.
     *
     * The birthday associated with the customer profile, in RFC 3339 format. The year is optional. The
     * timezone and time are not allowed.
     * For example, `0000-09-21T00:00:00-00:00` represents a birthday on September 21 and `1998-09-21T00:00:
     * 00-00:00` represents a birthday on September 21, 1998.
     * You can also specify this value in `YYYY-MM-DD` format.
     *
     * @maps birthday
     */
    public function setBirthday($birthday = null)
    {
        $this->birthday = $birthday;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        if (isset($this->givenName)) {
            $json['given_name']      = $this->givenName;
        }
        if (isset($this->familyName)) {
            $json['family_name']     = $this->familyName;
        }
        if (isset($this->companyName)) {
            $json['company_name']    = $this->companyName;
        }
        if (isset($this->nickname)) {
            $json['nickname']        = $this->nickname;
        }
        if (isset($this->emailAddress)) {
            $json['email_address']   = $this->emailAddress;
        }
        if (isset($this->address)) {
            $json['address']         = $this->address;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']    = $this->phoneNumber;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']    = $this->referenceId;
        }
        if (isset($this->note)) {
            $json['note']            = $this->note;
        }
        if (isset($this->birthday)) {
            $json['birthday']        = $this->birthday;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
