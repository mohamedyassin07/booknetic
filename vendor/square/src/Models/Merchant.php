<?php



namespace Square\Models;

/**
 * Represents a Square seller.
 */
class Merchant implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $businessName;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string|null
     */
    private $languageCode;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $mainLocationId;

    /**
     * @param $country
     */
    public function __construct($country)
    {
        $this->country = $country;
    }

    /**
     * Returns Id.
     *
     * The Square-issued ID of the merchant.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-issued ID of the merchant.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Business Name.
     *
     * The business name of the merchant.
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Sets Business Name.
     *
     * The business name of the merchant.
     *
     * @maps business_name
     */
    public function setBusinessName($businessName = null)
    {
        $this->businessName = $businessName;
    }

    /**
     * Returns Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets Country.
     *
     * Indicates the country associated with another entity, such as a business.
     * Values are in [ISO 3166-1-alpha-2 format](http://www.iso.org/iso/home/standards/country_codes.htm).
     *
     * @required
     * @maps country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Returns Language Code.
     *
     * The language code associated with the merchant account, in BCP 47 format.
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * Sets Language Code.
     *
     * The language code associated with the merchant account, in BCP 47 format.
     *
     * @maps language_code
     */
    public function setLanguageCode($languageCode = null)
    {
        $this->languageCode = $languageCode;
    }

    /**
     * Returns Currency.
     *
     * Indicates the associated currency for an amount of money. Values correspond
     * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Sets Currency.
     *
     * Indicates the associated currency for an amount of money. Values correspond
     * to [ISO 4217](https://wikipedia.org/wiki/ISO_4217).
     *
     * @maps currency
     */
    public function setCurrency($currency = null)
    {
        $this->currency = $currency;
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
     * Returns Main Location Id.
     *
     * The ID of the main `Location` for this merchant.
     */
    public function getMainLocationId()
    {
        return $this->mainLocationId;
    }

    /**
     * Sets Main Location Id.
     *
     * The ID of the main `Location` for this merchant.
     *
     * @maps main_location_id
     */
    public function setMainLocationId($mainLocationId = null)
    {
        $this->mainLocationId = $mainLocationId;
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
            $json['id']               = $this->id;
        }
        if (isset($this->businessName)) {
            $json['business_name']    = $this->businessName;
        }
        $json['country']              = $this->country;
        if (isset($this->languageCode)) {
            $json['language_code']    = $this->languageCode;
        }
        if (isset($this->currency)) {
            $json['currency']         = $this->currency;
        }
        if (isset($this->status)) {
            $json['status']           = $this->status;
        }
        if (isset($this->mainLocationId)) {
            $json['main_location_id'] = $this->mainLocationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
