<?php



namespace Square\Models;

/**
 * A request to retrieve gift cards by their GANs.
 */
class RetrieveGiftCardFromGANRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $gan;

    /**
     * @param $gan
     */
    public function __construct($gan)
    {
        $this->gan = $gan;
    }

    /**
     * Returns Gan.
     *
     * The gift card account number (GAN) of the gift card to retrieve.
     * The maximum length of a GAN is 255 digits to account for third-party GANs that have been imported.
     * Square-issued gift cards have 16-digit GANs.
     */
    public function getGan()
    {
        return $this->gan;
    }

    /**
     * Sets Gan.
     *
     * The gift card account number (GAN) of the gift card to retrieve.
     * The maximum length of a GAN is 255 digits to account for third-party GANs that have been imported.
     * Square-issued gift cards have 16-digit GANs.
     *
     * @required
     * @maps gan
     */
    public function setGan($gan)
    {
        $this->gan = $gan;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['gan'] = $this->gan;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
