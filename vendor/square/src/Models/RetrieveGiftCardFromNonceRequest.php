<?php



namespace Square\Models;

/**
 * A request to retrieve gift cards by using nonces.
 */
class RetrieveGiftCardFromNonceRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $nonce;

    /**
     * @param $nonce
     */
    public function __construct($nonce)
    {
        $this->nonce = $nonce;
    }

    /**
     * Returns Nonce.
     *
     * The nonce of the gift card to retrieve.
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * Sets Nonce.
     *
     * The nonce of the gift card to retrieve.
     *
     * @required
     * @maps nonce
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['nonce'] = $this->nonce;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
