<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppImageAdAdd extends ImageAdAddBase
{
    /**
     * @JMS\Type("string")
     * @var string $TrackingUrl
     */
    private $TrackingUrl;

    /**
     * @param string $adImageHash
     */
    public function __construct($adImageHash = null)
    {
        parent::__construct($adImageHash);
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
        return $this->TrackingUrl;
    }

    /**
     * @param string $TrackingUrl
     * @return static
     */
    public function setTrackingUrl($TrackingUrl)
    {
        $this->TrackingUrl = $TrackingUrl;

        return $this;
    }
}
