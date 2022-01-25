<?php



namespace Square\Models;

/**
 * Represents the Square processing fee.
 */
class ProcessingFee implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $effectiveAt;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * Returns Effective At.
     *
     * The timestamp of when the fee takes effect, in RFC 3339 format.
     */
    public function getEffectiveAt()
    {
        return $this->effectiveAt;
    }

    /**
     * Sets Effective At.
     *
     * The timestamp of when the fee takes effect, in RFC 3339 format.
     *
     * @maps effective_at
     */
    public function setEffectiveAt($effectiveAt = null)
    {
        $this->effectiveAt = $effectiveAt;
    }

    /**
     * Returns Type.
     *
     * The type of fee assessed or adjusted. The fee type can be `INITIAL` or `ADJUSTMENT`.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of fee assessed or adjusted. The fee type can be `INITIAL` or `ADJUSTMENT`.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
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
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney = null)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->effectiveAt)) {
            $json['effective_at'] = $this->effectiveAt;
        }
        if (isset($this->type)) {
            $json['type']         = $this->type;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money'] = $this->amountMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
