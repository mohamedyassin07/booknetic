<?php



namespace Square\Models;

class Location implements \JsonSerializable
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
     * @var Address|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $timezone;

    /**
     * @var string[]|null
     */
    private $capabilities;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
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
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $businessName;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $websiteUrl;

    /**
     * @var BusinessHours|null
     */
    private $businessHours;

    /**
     * @var string|null
     */
    private $businessEmail;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $twitterUsername;

    /**
     * @var string|null
     */
    private $instagramUsername;

    /**
     * @var string|null
     */
    private $facebookUrl;

    /**
     * @var Coordinates|null
     */
    private $coordinates;

    /**
     * @var string|null
     */
    private $logoUrl;

    /**
     * @var string|null
     */
    private $posBackgroundUrl;

    /**
     * @var string|null
     */
    private $mcc;

    /**
     * @var string|null
     */
    private $fullFormatLogoUrl;

    /**
     * @var TaxIds|null
     */
    private $taxIds;

    /**
     * Returns Id.
     *
     * The Square-issued ID of the location.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-issued ID of the location.
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
     * The name of the location.
     * This information appears in the dashboard as the nickname.
     * A location name must be unique within a seller account.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the location.
     * This information appears in the dashboard as the nickname.
     * A location name must be unique within a seller account.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
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
     * Returns Timezone.
     *
     * The [IANA Timezone](https://www.iana.org/time-zones) identifier for
     * the timezone of the location.
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Sets Timezone.
     *
     * The [IANA Timezone](https://www.iana.org/time-zones) identifier for
     * the timezone of the location.
     *
     * @maps timezone
     */
    public function setTimezone($timezone = null)
    {
        $this->timezone = $timezone;
    }

    /**
     * Returns Capabilities.
     *
     * The Square features that are enabled for the location.
     * See [LocationCapability]($m/LocationCapability) for possible values.
     * See [LocationCapability](#type-locationcapability) for possible values
     *
     * @return string[]|null
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * Sets Capabilities.
     *
     * The Square features that are enabled for the location.
     * See [LocationCapability]($m/LocationCapability) for possible values.
     * See [LocationCapability](#type-locationcapability) for possible values
     *
     * @maps capabilities
     *
     * @param string[]|null $capabilities
     */
    public function setCapabilities(array $capabilities = null)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * Returns Status.
     *
     * The status of the location, whether a location is active or inactive.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the location, whether a location is active or inactive.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Created At.
     *
     * The time when the location was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the location was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Merchant Id.
     *
     * The ID of the merchant that owns the location.
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     *
     * The ID of the merchant that owns the location.
     *
     * @maps merchant_id
     */
    public function setMerchantId($merchantId = null)
    {
        $this->merchantId = $merchantId;
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
     * @maps country
     */
    public function setCountry($country = null)
    {
        $this->country = $country;
    }

    /**
     * Returns Language Code.
     *
     * The language associated with the location, in
     * [BCP 47 format](https://tools.ietf.org/html/bcp47#appendix-A).
     * For more information, see [Location language code](https://developer.squareup.com/docs/locations-
     * api#location-language-code).
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * Sets Language Code.
     *
     * The language associated with the location, in
     * [BCP 47 format](https://tools.ietf.org/html/bcp47#appendix-A).
     * For more information, see [Location language code](https://developer.squareup.com/docs/locations-
     * api#location-language-code).
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
     * Returns Phone Number.
     *
     * The phone number of the location in human readable format.
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the location in human readable format.
     *
     * @maps phone_number
     */
    public function setPhoneNumber($phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Business Name.
     *
     * The business name of the location
     * This is the name visible to the customers of the location.
     * For example, this name appears on customer receipts.
     */
    public function getBusinessName()
    {
        return $this->businessName;
    }

    /**
     * Sets Business Name.
     *
     * The business name of the location
     * This is the name visible to the customers of the location.
     * For example, this name appears on customer receipts.
     *
     * @maps business_name
     */
    public function setBusinessName($businessName = null)
    {
        $this->businessName = $businessName;
    }

    /**
     * Returns Type.
     *
     * A location's physical or mobile type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * A location's physical or mobile type.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Website Url.
     *
     * The website URL of the location.
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Sets Website Url.
     *
     * The website URL of the location.
     *
     * @maps website_url
     */
    public function setWebsiteUrl($websiteUrl = null)
    {
        $this->websiteUrl = $websiteUrl;
    }

    /**
     * Returns Business Hours.
     *
     * Represents the hours of operation for a business location.
     */
    public function getBusinessHours()
    {
        return $this->businessHours;
    }

    /**
     * Sets Business Hours.
     *
     * Represents the hours of operation for a business location.
     *
     * @maps business_hours
     */
    public function setBusinessHours(BusinessHours $businessHours = null)
    {
        $this->businessHours = $businessHours;
    }

    /**
     * Returns Business Email.
     *
     * The email of the location.
     * This email is visible to the customers of the location.
     * For example, the email appears on customer receipts.
     */
    public function getBusinessEmail()
    {
        return $this->businessEmail;
    }

    /**
     * Sets Business Email.
     *
     * The email of the location.
     * This email is visible to the customers of the location.
     * For example, the email appears on customer receipts.
     *
     * @maps business_email
     */
    public function setBusinessEmail($businessEmail = null)
    {
        $this->businessEmail = $businessEmail;
    }

    /**
     * Returns Description.
     *
     * The description of the location.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the location.
     *
     * @maps description
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
    }

    /**
     * Returns Twitter Username.
     *
     * The Twitter username of the location without the '@' symbol.
     */
    public function getTwitterUsername()
    {
        return $this->twitterUsername;
    }

    /**
     * Sets Twitter Username.
     *
     * The Twitter username of the location without the '@' symbol.
     *
     * @maps twitter_username
     */
    public function setTwitterUsername($twitterUsername = null)
    {
        $this->twitterUsername = $twitterUsername;
    }

    /**
     * Returns Instagram Username.
     *
     * The Instagram username of the location without the '@' symbol.
     */
    public function getInstagramUsername()
    {
        return $this->instagramUsername;
    }

    /**
     * Sets Instagram Username.
     *
     * The Instagram username of the location without the '@' symbol.
     *
     * @maps instagram_username
     */
    public function setInstagramUsername($instagramUsername = null)
    {
        $this->instagramUsername = $instagramUsername;
    }

    /**
     * Returns Facebook Url.
     *
     * The Facebook profile URL of the location. The URL should begin with 'facebook.com/'.
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * Sets Facebook Url.
     *
     * The Facebook profile URL of the location. The URL should begin with 'facebook.com/'.
     *
     * @maps facebook_url
     */
    public function setFacebookUrl($facebookUrl = null)
    {
        $this->facebookUrl = $facebookUrl;
    }

    /**
     * Returns Coordinates.
     *
     * Latitude and longitude coordinates.
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * Sets Coordinates.
     *
     * Latitude and longitude coordinates.
     *
     * @maps coordinates
     */
    public function setCoordinates(Coordinates $coordinates = null)
    {
        $this->coordinates = $coordinates;
    }

    /**
     * Returns Logo Url.
     *
     * The URL of the logo image for the location. The Seller must choose this logo in the Seller
     * dashboard (Receipts section) for the logo to appear on transactions (such as receipts, invoices)
     * that Square generates on behalf of the Seller. This image should have an aspect ratio
     * close to 1:1 and is recommended to be at least 200x200 pixels.
     */
    public function getLogoUrl()
    {
        return $this->logoUrl;
    }

    /**
     * Sets Logo Url.
     *
     * The URL of the logo image for the location. The Seller must choose this logo in the Seller
     * dashboard (Receipts section) for the logo to appear on transactions (such as receipts, invoices)
     * that Square generates on behalf of the Seller. This image should have an aspect ratio
     * close to 1:1 and is recommended to be at least 200x200 pixels.
     *
     * @maps logo_url
     */
    public function setLogoUrl($logoUrl = null)
    {
        $this->logoUrl = $logoUrl;
    }

    /**
     * Returns Pos Background Url.
     *
     * The URL of the Point of Sale background image for the location.
     */
    public function getPosBackgroundUrl()
    {
        return $this->posBackgroundUrl;
    }

    /**
     * Sets Pos Background Url.
     *
     * The URL of the Point of Sale background image for the location.
     *
     * @maps pos_background_url
     */
    public function setPosBackgroundUrl($posBackgroundUrl = null)
    {
        $this->posBackgroundUrl = $posBackgroundUrl;
    }

    /**
     * Returns Mcc.
     *
     * The merchant category code (MCC) of the location, as standardized by ISO 18245.
     * The MCC describes the kind of goods or services sold at the location.
     */
    public function getMcc()
    {
        return $this->mcc;
    }

    /**
     * Sets Mcc.
     *
     * The merchant category code (MCC) of the location, as standardized by ISO 18245.
     * The MCC describes the kind of goods or services sold at the location.
     *
     * @maps mcc
     */
    public function setMcc($mcc = null)
    {
        $this->mcc = $mcc;
    }

    /**
     * Returns Full Format Logo Url.
     *
     * The URL of a full-format logo image for the location. The Seller must choose this logo in the
     * Seller dashboard (Receipts section) for the logo to appear on transactions (such as receipts,
     * invoices)
     * that Square generates on behalf of the Seller. This image can have an aspect ratio of 2:1 or
     * greater
     * and is recommended to be at least 1280x648 pixels.
     */
    public function getFullFormatLogoUrl()
    {
        return $this->fullFormatLogoUrl;
    }

    /**
     * Sets Full Format Logo Url.
     *
     * The URL of a full-format logo image for the location. The Seller must choose this logo in the
     * Seller dashboard (Receipts section) for the logo to appear on transactions (such as receipts,
     * invoices)
     * that Square generates on behalf of the Seller. This image can have an aspect ratio of 2:1 or
     * greater
     * and is recommended to be at least 1280x648 pixels.
     *
     * @maps full_format_logo_url
     */
    public function setFullFormatLogoUrl($fullFormatLogoUrl = null)
    {
        $this->fullFormatLogoUrl = $fullFormatLogoUrl;
    }

    /**
     * Returns Tax Ids.
     *
     * The tax IDs that a Location is operating under.
     */
    public function getTaxIds()
    {
        return $this->taxIds;
    }

    /**
     * Sets Tax Ids.
     *
     * The tax IDs that a Location is operating under.
     *
     * @maps tax_ids
     */
    public function setTaxIds(TaxIds $taxIds = null)
    {
        $this->taxIds = $taxIds;
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
            $json['id']                   = $this->id;
        }
        if (isset($this->name)) {
            $json['name']                 = $this->name;
        }
        if (isset($this->address)) {
            $json['address']              = $this->address;
        }
        if (isset($this->timezone)) {
            $json['timezone']             = $this->timezone;
        }
        if (isset($this->capabilities)) {
            $json['capabilities']         = $this->capabilities;
        }
        if (isset($this->status)) {
            $json['status']               = $this->status;
        }
        if (isset($this->createdAt)) {
            $json['created_at']           = $this->createdAt;
        }
        if (isset($this->merchantId)) {
            $json['merchant_id']          = $this->merchantId;
        }
        if (isset($this->country)) {
            $json['country']              = $this->country;
        }
        if (isset($this->languageCode)) {
            $json['language_code']        = $this->languageCode;
        }
        if (isset($this->currency)) {
            $json['currency']             = $this->currency;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']         = $this->phoneNumber;
        }
        if (isset($this->businessName)) {
            $json['business_name']        = $this->businessName;
        }
        if (isset($this->type)) {
            $json['type']                 = $this->type;
        }
        if (isset($this->websiteUrl)) {
            $json['website_url']          = $this->websiteUrl;
        }
        if (isset($this->businessHours)) {
            $json['business_hours']       = $this->businessHours;
        }
        if (isset($this->businessEmail)) {
            $json['business_email']       = $this->businessEmail;
        }
        if (isset($this->description)) {
            $json['description']          = $this->description;
        }
        if (isset($this->twitterUsername)) {
            $json['twitter_username']     = $this->twitterUsername;
        }
        if (isset($this->instagramUsername)) {
            $json['instagram_username']   = $this->instagramUsername;
        }
        if (isset($this->facebookUrl)) {
            $json['facebook_url']         = $this->facebookUrl;
        }
        if (isset($this->coordinates)) {
            $json['coordinates']          = $this->coordinates;
        }
        if (isset($this->logoUrl)) {
            $json['logo_url']             = $this->logoUrl;
        }
        if (isset($this->posBackgroundUrl)) {
            $json['pos_background_url']   = $this->posBackgroundUrl;
        }
        if (isset($this->mcc)) {
            $json['mcc']                  = $this->mcc;
        }
        if (isset($this->fullFormatLogoUrl)) {
            $json['full_format_logo_url'] = $this->fullFormatLogoUrl;
        }
        if (isset($this->taxIds)) {
            $json['tax_ids']              = $this->taxIds;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
