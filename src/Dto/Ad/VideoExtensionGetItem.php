<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\Enum\AdExtensionTypeEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class VideoExtensionGetItem
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $CreativeId
     */
    private $CreativeId;

    /**
     * @JMS\Type("string")
     *
     * @var string $Status
     */
    private $Status;

    /**
     * @JMS\Type("string")
     *
     * @var string $ThumbnailUrl
     */
    private $ThumbnailUrl;

    /**
     * @JMS\Type("string")
     *
     * @var string $PreviewUrl
     */
    private $PreviewUrl;

    /**
     * @param int $CreativeId
     * @param string $Status
     * @param string $ThumbnailUrl
     * @param string $PreviewUrl
     */
    public function __construct($CreativeId, $Status, $ThumbnailUrl, $PreviewUrl)
    {
        $this->CreativeId = $CreativeId;
        $this->Status = $Status;
        $this->ThumbnailUrl = $ThumbnailUrl;
        $this->PreviewUrl = $PreviewUrl;
    }

    /**
     * @return int
     */
    public function getCreativeId()
    {
        return $this->CreativeId;
    }

    /**
     * @param int $CreativeId
     */
    public function setCreativeId($CreativeId)
    {
        $this->CreativeId = $CreativeId;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl()
    {
        return $this->ThumbnailUrl;
    }

    /**
     * @param string $ThumbnailUrl
     */
    public function setThumbnailUrl($ThumbnailUrl)
    {
        $this->ThumbnailUrl = $ThumbnailUrl;
    }

    /**
     * @return string
     */
    public function getPreviewUrl()
    {
        return $this->PreviewUrl;
    }

    /**
     * @param string $PreviewUrl
     */
    public function setPreviewUrl($PreviewUrl)
    {
        $this->PreviewUrl = $PreviewUrl;
    }
}
