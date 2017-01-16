<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextImageAdUpdate extends ImageAdUpdateBase
{
    /**
     * @JMS\Type("string")
     *
     * @var string $Href
     */
    protected $Href;

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->Href;
    }

    /**
     * @param string $Href
     * @return self
     */
    public function setHref($Href)
    {
        $this->Href = $Href;
    
        return $this;
    }
}
