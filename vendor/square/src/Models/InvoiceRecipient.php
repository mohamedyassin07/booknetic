<?php



namespace Square\Models;

/**
 * Provides customer data that Square uses to deliver an invoice.
 */
class InvoiceRecipient implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $customerId;

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
    private $companyName;

    /**
     * Returns Customer Id.
     *
     * The ID of the customer. This is the customer profile ID that
     * you provide when creating a draft invoice.
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the customer. This is the customer profile ID that
     * you provide when creating a draft invoice.
     *
     * @maps customer_id
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Given Name.
     *
     * The recipient's given (that is, first) name.
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     *
     * The recipient's given (that is, first) name.
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
     * The recipient's family (that is, last) name.
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     *
     * The recipient's family (that is, last) name.
     *
     * @maps family_name
     */
    public function setFamilyName($familyName = null)
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns Email Address.
     *
     * The recipient's email address.
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The recipient's email address.
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
     * The recipient's phone number.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The recipient's phone number.
     *
     * @maps phone_number
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Company Name.
     *
     * The name of the recipient's company.
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Sets Company Name.
     *
     * The name of the recipient's company.
     *
     * @maps company_name
     */
    public function setCompanyName($companyName = null)
    {
        $this->companyName = $companyName;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->customerId)) {
            $json['customer_id']   = $this->customerId;
        }
        if (isset($this->givenName)) {
            $json['given_name']    = $this->givenName;
        }
        if (isset($this->familyName)) {
            $json['family_name']   = $this->familyName;
        }
        if (isset($this->emailAddress)) {
            $json['email_address'] = $this->emailAddress;
        }
        if (isset($this->address)) {
            $json['address']       = $this->address;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']  = $this->phoneNumber;
        }
        if (isset($this->companyName)) {
            $json['company_name']  = $this->companyName;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
