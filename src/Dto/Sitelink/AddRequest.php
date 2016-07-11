<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem")
     *
     * @var SitelinksSetAddItem $SitelinksSets
     */
    private $SitelinksSets;

    /**
     * @param SitelinksSetAddItem $SitelinksSets
     */
    public function __construct(SitelinksSetAddItem $SitelinksSets = null)
    {
      $this->SitelinksSets = $SitelinksSets;
    }

    /**
     * @return SitelinksSetAddItem
     */
    public function getSitelinksSets()
    {
      return $this->SitelinksSets;
    }

    /**
     * @param SitelinksSetAddItem $SitelinksSets
     * @return \eLama\DirectApiV5\Dto\Sitelink\AddRequest
     */
    public function setSitelinksSets(SitelinksSetAddItem $SitelinksSets)
    {
      $this->SitelinksSets = $SitelinksSets;
      return $this;
    }

}
