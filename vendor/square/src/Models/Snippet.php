<?php



namespace Square\Models;

/**
 * Represents the snippet that is added to a Square Online site. The snippet code is injected into the
 * `head` element of all pages on the site, except for checkout pages.
 */
class Snippet implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $siteId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID for the snippet.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID for the snippet.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Site Id.
     *
     * The ID of the site that contains the snippet.
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * Sets Site Id.
     *
     * The ID of the site that contains the snippet.
     *
     * @maps site_id
     */
    public function setSiteId($siteId = null)
    {
        $this->siteId = $siteId;
    }

    /**
     * Returns Content.
     *
     * The snippet code, which can contain valid HTML, JavaScript, or both.
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets Content.
     *
     * The snippet code, which can contain valid HTML, JavaScript, or both.
     *
     * @required
     * @maps content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Returns Created At.
     *
     * The timestamp of when the snippet was initially added to the site, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp of when the snippet was initially added to the site, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp of when the snippet was last updated on the site, in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp of when the snippet was last updated on the site, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']         = $this->id;
        }
        if (isset($this->siteId)) {
            $json['site_id']    = $this->siteId;
        }
        $json['content']        = $this->content;
        if (isset($this->createdAt)) {
            $json['created_at'] = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at'] = $this->updatedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
