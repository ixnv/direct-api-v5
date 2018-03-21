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
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\Enum\VideoExtensionTypeEnum")
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
    public function getCreativeId(): int
    {
        return $this->CreativeId;
    }

    /**
     * @param int $CreativeId
     */
    public function setCreativeId(int $CreativeId): void
    {
        $this->CreativeId = $CreativeId;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @param string $Status
     */
    public function setStatus(string $Status): void
    {
        $this->Status = $Status;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): string
    {
        return $this->ThumbnailUrl;
    }

    /**
     * @param string $ThumbnailUrl
     */
    public function setThumbnailUrl(string $ThumbnailUrl): void
    {
        $this->ThumbnailUrl = $ThumbnailUrl;
    }

    /**
     * @return string
     */
    public function getPreviewUrl(): string
    {
        return $this->PreviewUrl;
    }

    /**
     * @param string $PreviewUrl
     */
    public function setPreviewUrl(string $PreviewUrl): void
    {
        $this->PreviewUrl = $PreviewUrl;
    }
}
