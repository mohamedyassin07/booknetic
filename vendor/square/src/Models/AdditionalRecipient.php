<?php



namespace Square\Models;

/**
 * Represents an additional recipient (other than the merchant) receiving a portion of this tender.
 */
class AdditionalRecipient implements \JsonSerializable
{
    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $receivableId;

    /**
     * @param $locationId
     * @param Money $amountMoney
     */
    public function __construct($locationId, Money $amountMoney)
    {
        $this->locationId = $locationId;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Location Id.
     *
     * The location ID for a recipient (other than the merchant) receiving a portion of this tender.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location ID for a recipient (other than the merchant) receiving a portion of this tender.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Description.
     *
     * The description of the additional recipient.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets Description.
     *
     * The description of the additional recipient.
     *
     * @maps description
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney()
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @required
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Receivable Id.
     *
     * The unique ID for this [AdditionalRecipientReceivable]($m/AdditionalRecipientReceivable), assigned
     * by the server.
     */
    public function getReceivableId()
    {
        return $this->receivableId;
    }

    /**
     * Sets Receivable Id.
     *
     * The unique ID for this [AdditionalRecipientReceivable]($m/AdditionalRecipientReceivable), assigned
     * by the server.
     *
     * @maps receivable_id
     */
    public function setReceivableId($receivableId = null)
    {
        $this->receivableId = $receivableId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_id']       = $this->locationId;
        if (isset($this->description)) {
            $json['description']   = $this->description;
        }
        $json['amount_money']      = $this->amountMoney;
        if (isset($this->receivableId)) {
            $json['receivable_id'] = $this->receivableId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
