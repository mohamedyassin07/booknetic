<?php



namespace Square\Models;

/**
 * Contains information about the recipient of a fulfillment.
 */
class OrderFulfillmentRecipient implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var Address|null
     */
    private $address;

    /**
     * Returns Customer Id.
     *
     * The customer ID of the customer associated with the fulfillment.
     *
     * If `customer_id` is provided, the fulfillment recipient's `display_name`,
     * `email_address`, and `phone_number` are automatically populated from the
     * targeted customer profile. If these fields are set in the request, the request
     * values overrides the information from the customer profile. If the
     * targeted customer profile does not contain the necessary information and
     * these fields are left unset, the request results in an error.
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The customer ID of the customer associated with the fulfillment.
     *
     * If `customer_id` is provided, the fulfillment recipient's `display_name`,
     * `email_address`, and `phone_number` are automatically populated from the
     * targeted customer profile. If these fields are set in the request, the request
     * values overrides the information from the customer profile. If the
     * targeted customer profile does not contain the necessary information and
     * these fields are left unset, the request results in an error.
     *
     * @maps customer_id
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Display Name.
     *
     * The display name of the fulfillment recipient.
     *
     * If provided, the display name overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Sets Display Name.
     *
     * The display name of the fulfillment recipient.
     *
     * If provided, the display name overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     *
     * @maps display_name
     */
    public function setDisplayName($displayName = null)
    {
        $this->displayName = $displayName;
    }

    /**
     * Returns Email Address.
     *
     * The email address of the fulfillment recipient.
     *
     * If provided, the email address overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The email address of the fulfillment recipient.
     *
     * If provided, the email address overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     *
     * @maps email_address
     */
    public function setEmailAddress($emailAddress = null)
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns Phone Number.
     *
     * The phone number of the fulfillment recipient.
     *
     * If provided, the phone number overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the fulfillment recipient.
     *
     * If provided, the phone number overrides the value pulled from the customer profile indicated by
     * `customer_id`.
     *
     * @maps phone_number
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;
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
        if (isset($this->displayName)) {
            $json['display_name']  = $this->displayName;
        }
        if (isset($this->emailAddress)) {
            $json['email_address'] = $this->emailAddress;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']  = $this->phoneNumber;
        }
        if (isset($this->address)) {
            $json['address']       = $this->address;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
