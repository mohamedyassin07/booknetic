<?php



namespace Square\Models;

/**
 * Represents the details of a tender with `type` `CASH`.
 */
class TenderCashDetails implements \JsonSerializable
{
    /**
     * @var Money|null
     */
    private $buyerTenderedMoney;

    /**
     * @var Money|null
     */
    private $changeBackMoney;

    /**
     * Returns Buyer Tendered Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getBuyerTenderedMoney()
    {
        return $this->buyerTenderedMoney;
    }

    /**
     * Sets Buyer Tendered Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps buyer_tendered_money
     */
    public function setBuyerTenderedMoney(Money $buyerTenderedMoney = null)
    {
        $this->buyerTenderedMoney = $buyerTenderedMoney;
    }

    /**
     * Returns Change Back Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getChangeBackMoney()
    {
        return $this->changeBackMoney;
    }

    /**
     * Sets Change Back Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps change_back_money
     */
    public function setChangeBackMoney(Money $changeBackMoney = null)
    {
        $this->changeBackMoney = $changeBackMoney;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->buyerTenderedMoney)) {
            $json['buyer_tendered_money'] = $this->buyerTenderedMoney;
        }
        if (isset($this->changeBackMoney)) {
            $json['change_back_money']    = $this->changeBackMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
