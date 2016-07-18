<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class TextAdAddBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $VCardId
     */
    private $VCardId;

    /**
     * @JMS\Type("string")
     *
     * @var string $AdImageHash
     */
    private $AdImageHash;

    /**
     * @JMS\Type("integer")
     *
     * @var int $SitelinkSetId
     */
    private $SitelinkSetId;

    /**
     * @return int
     */
    public function getVCardId()
    {
      return $this->VCardId;
    }

    /**
     * @param int $VCardId
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAddBase
     */
    public function setVCardId($VCardId = null)
    {
      $this->VCardId = $VCardId;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAddBase
     */
    public function setAdImageHash($AdImageHash)
    {
      $this->AdImageHash = $AdImageHash;
      return $this;
    }

    /**
     * @return int
     */
    public function getSitelinkSetId()
    {
      return $this->SitelinkSetId;
    }

    /**
     * @param int $SitelinkSetId
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAddBase
     */
    public function setSitelinkSetId($SitelinkSetId)
    {
      $this->SitelinkSetId = $SitelinkSetId;
      return $this;
    }

}
