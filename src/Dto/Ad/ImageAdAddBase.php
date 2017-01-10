<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ImageAdAddBase
{
    /**
     * @JMS\Type("string")
     * @var string $AdImageHash
     */
    private $AdImageHash;

    /**
     * @param string $adImageHash
     */
    public function __construct($adImageHash = null)
    {
        $this->AdImageHash = $adImageHash;
    }

    /**
     * @return string
     */
    public function getAdImageHash()
    {
        return $this->AdImageHash;
    }

    /**
     * @param string $AdImageHash
     * @return static
     */
    public function setAdImageHash($AdImageHash)
    {
        $this->AdImageHash = $AdImageHash;

        return $this;
    }
}
