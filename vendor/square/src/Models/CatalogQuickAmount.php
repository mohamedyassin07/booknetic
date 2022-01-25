<?php



namespace Square\Models;

/**
 * Represents a Quick Amount in the Catalog.
 */
class CatalogQuickAmount implements \JsonSerializable
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var Money
     */
    private $amount;

    /**
     * @var int|null
     */
    private $score;

    /**
     * @var int|null
     */
    private $ordinal;

    /**
     * @param $type
     * @param Money $amount
     */
    public function __construct($type, Money $amount)
    {
        $this->type = $type;
        $this->amount = $amount;
    }

    /**
     * Returns Type.
     *
     * Determines the type of a specific Quick Amount.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Determines the type of a specific Quick Amount.
     *
     * @required
     * @maps type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns Amount.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Sets Amount.
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
     * @maps amount
     */
    public function setAmount(Money $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Returns Score.
     *
     * Describes the ranking of the Quick Amount provided by machine learning model, in the range [0, 100].
     * MANUAL type amount will always have score = 100.
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Sets Score.
     *
     * Describes the ranking of the Quick Amount provided by machine learning model, in the range [0, 100].
     * MANUAL type amount will always have score = 100.
     *
     * @maps score
     */
    public function setScore($score = null)
    {
        $this->score = $score;
    }

    /**
     * Returns Ordinal.
     *
     * The order in which this Quick Amount should be displayed.
     */
    public function getOrdinal()
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * The order in which this Quick Amount should be displayed.
     *
     * @maps ordinal
     */
    public function setOrdinal($ordinal = null)
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['type']        = $this->type;
        $json['amount']      = $this->amount;
        if (isset($this->score)) {
            $json['score']   = $this->score;
        }
        if (isset($this->ordinal)) {
            $json['ordinal'] = $this->ordinal;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
