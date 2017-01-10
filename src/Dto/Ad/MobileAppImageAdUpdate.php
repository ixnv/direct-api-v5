<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class MobileAppImageAdUpdate extends ImageAdUpdateBase
{
    /**
     * @JMS\Type("string")
     * @var string $TrackingUrl
     */
    private $TrackingUrl;

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
