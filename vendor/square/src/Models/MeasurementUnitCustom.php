<?php



namespace Square\Models;

/**
 * The information needed to define a custom unit, provided by the seller.
 */
class MeasurementUnitCustom implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $abbreviation;

    /**
     * @param $name
     * @param $abbreviation
     */
    public function __construct($name, $abbreviation)
    {
        $this->name = $name;
        $this->abbreviation = $abbreviation;
    }

    /**
     * Returns Name.
     *
     * The name of the custom unit, for example "bushel".
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the custom unit, for example "bushel".
     *
     * @required
     * @maps name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns Abbreviation.
     *
     * The abbreviation of the custom unit, such as "bsh" (bushel). This appears
     * in the cart for the Point of Sale app, and in reports.
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Sets Abbreviation.
     *
     * The abbreviation of the custom unit, such as "bsh" (bushel). This appears
     * in the cart for the Point of Sale app, and in reports.
     *
     * @required
     * @maps abbreviation
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['name']         = $this->name;
        $json['abbreviation'] = $this->abbreviation;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
