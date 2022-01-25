<?php



namespace Square\Models;

/**
 * V1SettlementEntry
 */
class V1SettlementEntry implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var V1Money|null
     */
    private $amountMoney;

    /**
     * @var V1Money|null
     */
    private $feeMoney;

    /**
     * Returns Payment Id.
     *
     * The settlement's unique identifier.
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The settlement's unique identifier.
     *
     * @maps payment_id
     */
    public function setPaymentId($paymentId = null)
    {
        $this->paymentId = $paymentId;
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
     * Returns Fee Money.
     */
    public function getFeeMoney()
    {
        return $this->feeMoney;
    }

    /**
     * Sets Fee Money.
     *
     * @maps fee_money
     */
    public function setFeeMoney(V1Money $feeMoney = null)
    {
        $this->feeMoney = $feeMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->paymentId)) {
            $json['payment_id']   = $this->paymentId;
        }
        if (isset($this->type)) {
            $json['type']         = $this->type;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money'] = $this->amountMoney;
        }
        if (isset($this->feeMoney)) {
            $json['fee_money']    = $this->feeMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
