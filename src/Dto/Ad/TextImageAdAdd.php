<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextImageAdAdd extends ImageAdAddBase
{
    /**
     * @JMS\Type("string")
     * @var string $Href
     */
    private $Href;

    /**
     * @param string $adImageHash
     * @param string $href
     */
    public function __construct($adImageHash = null, $href = null)
    {
        parent::__construct($adImageHash);
        $this->Href = $href;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->Href;
    }

    /**
     * @param string $href
     * @return self
     */
    public function setHref($href)
    {
        $this->Href = $href;

        return $this;
    }
}
