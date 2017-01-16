<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextImageAdGet extends ImageAdGetBase
{
    /**
     * @JMS\Type("string")
     *
     * @var string $Href
     */
    private $Href;

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
