<?php



namespace Square\Models;

/**
 * Stores details about a cash payment. Contains only non-confidential information. For more
 * information, see
 * [Take Cash Payments](https://developer.squareup.com/docs/payments-api/take-payments/cash-payments).
 */
class CashPaymentDetails implements \JsonSerializable
{
    /**
     * @var Money
     */
    private $buyerSuppliedMoney;

    /**
     * @var Money|null
     */
    private $changeBackMoney;

    /**
     * @param Money $buyerSuppliedMoney
     */
    public function __construct(Money $buyerSuppliedMoney)
    {
        $this->buyerSuppliedMoney = $buyerSuppliedMoney;
    }

    /**
     * Returns Buyer Supplied Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getBuyerSuppliedMoney()
    {
        return $this->buyerSuppliedMoney;
    }

    /**
     * Sets Buyer Supplied Money.
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
     * @maps buyer_supplied_money
     */
    public function setBuyerSuppliedMoney(Money $buyerSuppliedMoney)
    {
        $this->buyerSuppliedMoney = $buyerSuppliedMoney;
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
        $json['buyer_supplied_money']  = $this->buyerSuppliedMoney;
        if (isset($this->changeBackMoney)) {
            $json['change_back_money'] = $this->changeBackMoney;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
