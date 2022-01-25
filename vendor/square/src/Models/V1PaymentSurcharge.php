<?php



namespace Square\Models;

/**
 * V1PaymentSurcharge
 */
class V1PaymentSurcharge implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var V1Money|null
     */
    private $appliedMoney;

    /**
     * @var string|null
     */
    private $rate;

    /**
     * @var V1Money|null
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var bool|null
     */
    private $taxable;

    /**
     * @var V1PaymentTax[]|null
     */
    private $taxes;

    /**
     * @var string|null
     */
    private $surchargeId;

    /**
     * Returns Name.
     *
     * The name of the surcharge.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the surcharge.
     *
     * @maps name
     */
    public function setName($name = null)
    {
        $this->name = $name;
    }

    /**
     * Returns Applied Money.
     */
    public function getAppliedMoney()
    {
        return $this->appliedMoney;
    }

    /**
     * Sets Applied Money.
     *
     * @maps applied_money
     */
    public function setAppliedMoney(V1Money $appliedMoney = null)
    {
        $this->appliedMoney = $appliedMoney;
    }

    /**
     * Returns Rate.
     *
     * The amount of the surcharge as a percentage. The percentage is provided as a string representing the
     * decimal equivalent of the percentage. For example, "0.7" corresponds to a 7% surcharge. Exactly one
     * of rate or amount_money should be set.
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Sets Rate.
     *
     * The amount of the surcharge as a percentage. The percentage is provided as a string representing the
     * decimal equivalent of the percentage. For example, "0.7" corresponds to a 7% surcharge. Exactly one
     * of rate or amount_money should be set.
     *
     * @maps rate
     */
    public function setRate($rate = null)
    {
        $this->rate = $rate;
    }

    /**
     * Returns Amount Money.
     */
    public function getAmountMoney()
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * @maps amount_money
     */
    public function setAmountMoney(V1Money $amountMoney = null)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType($type = null)
    {
        $this->type = $type;
    }

    /**
     * Returns Taxable.
     *
     * Indicates whether the surcharge is taxable.
     */
    public function getTaxable()
    {
        return $this->taxable;
    }

    /**
     * Sets Taxable.
     *
     * Indicates whether the surcharge is taxable.
     *
     * @maps taxable
     */
    public function setTaxable($taxable = null)
    {
        $this->taxable = $taxable;
    }

    /**
     * Returns Taxes.
     *
     * The list of taxes that should be applied to the surcharge.
     *
     * @return V1PaymentTax[]|null
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     * Sets Taxes.
     *
     * The list of taxes that should be applied to the surcharge.
     *
     * @maps taxes
     *
     * @param V1PaymentTax[]|null $taxes
     */
    public function setTaxes(array $taxes = null)
    {
        $this->taxes = $taxes;
    }

    /**
     * Returns Surcharge Id.
     *
     * A Square-issued unique identifier associated with the surcharge.
     */
    public function getSurchargeId()
    {
        return $this->surchargeId;
    }

    /**
     * Sets Surcharge Id.
     *
     * A Square-issued unique identifier associated with the surcharge.
     *
     * @maps surcharge_id
     */
    public function setSurchargeId($surchargeId = null)
    {
        $this->surchargeId = $surchargeId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->name)) {
            $json['name']          = $this->name;
        }
        if (isset($this->appliedMoney)) {
            $json['applied_money'] = $this->appliedMoney;
        }
        if (isset($this->rate)) {
            $json['rate']          = $this->rate;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']  = $this->amountMoney;
        }
        if (isset($this->type)) {
            $json['type']          = $this->type;
        }
        if (isset($this->taxable)) {
            $json['taxable']       = $this->taxable;
        }
        if (isset($this->taxes)) {
            $json['taxes']         = $this->taxes;
        }
        if (isset($this->surchargeId)) {
            $json['surcharge_id']  = $this->surchargeId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
