<?php



namespace Square\Models;

/**
 * Represents a phone number.
 */
class V1PhoneNumber implements \JsonSerializable
{
    /**
     * @var string
     */
    private $callingCode;

    /**
     * @var string
     */
    private $number;

    /**
     * @param $callingCode
     * @param $number
     */
    public function __construct($callingCode, $number)
    {
        $this->callingCode = $callingCode;
        $this->number = $number;
    }

    /**
     * Returns Calling Code.
     *
     * The phone number's international calling code. For US phone numbers, this value is +1.
     */
    public function getCallingCode()
    {
        return $this->callingCode;
    }

    /**
     * Sets Calling Code.
     *
     * The phone number's international calling code. For US phone numbers, this value is +1.
     *
     * @required
     * @maps calling_code
     */
    public function setCallingCode($callingCode)
    {
        $this->callingCode = $callingCode;
    }

    /**
     * Returns Number.
     *
     * The phone number.
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets Number.
     *
     * The phone number.
     *
     * @required
     * @maps number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['calling_code'] = $this->callingCode;
        $json['number']       = $this->number;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
