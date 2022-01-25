<?php



namespace Square\Models;

/**
 * Represents an error encountered during a request to the Connect API.
 *
 * See [Handling errors](https://developer.squareup.com/docs/build-basics/handling-errors) for more
 * information.
 */
class Error implements \JsonSerializable
{
    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string|null
     */
    private $detail;

    /**
     * @var string|null
     */
    private $field;

    /**
     * @param $category
     * @param $code
     */
    public function __construct($category, $code)
    {
        $this->category = $category;
        $this->code = $code;
    }

    /**
     * Returns Category.
     *
     * Indicates which high-level category of error has occurred during a
     * request to the Connect API.
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets Category.
     *
     * Indicates which high-level category of error has occurred during a
     * request to the Connect API.
     *
     * @required
     * @maps category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Returns Code.
     *
     * Indicates the specific error that occurred during a request to a
     * Square API.
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Sets Code.
     *
     * Indicates the specific error that occurred during a request to a
     * Square API.
     *
     * @required
     * @maps code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Returns Detail.
     *
     * A human-readable description of the error for debugging purposes.
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Sets Detail.
     *
     * A human-readable description of the error for debugging purposes.
     *
     * @maps detail
     */
    public function setDetail($detail = null)
    {
        $this->detail = $detail;
    }

    /**
     * Returns Field.
     *
     * The name of the field provided in the original request (if any) that
     * the error pertains to.
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Sets Field.
     *
     * The name of the field provided in the original request (if any) that
     * the error pertains to.
     *
     * @maps field
     */
    public function setField($field = null)
    {
        $this->field = $field;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['category']   = $this->category;
        $json['code']       = $this->code;
        if (isset($this->detail)) {
            $json['detail'] = $this->detail;
        }
        if (isset($this->field)) {
            $json['field']  = $this->field;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
