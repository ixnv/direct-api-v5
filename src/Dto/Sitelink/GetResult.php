<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Sitelink\SitelinksSetGetItem")
     *
     * @var SitelinksSetGetItem $SitelinksSets
     */
    private $SitelinksSets;

    /**
     * @param SitelinksSetGetItem $SitelinksSets
     */
    public function __construct(SitelinksSetGetItem $SitelinksSets = null)
    {
      $this->SitelinksSets = $SitelinksSets;
    }

    /**
     * @return SitelinksSetGetItem
     */
    public function getSitelinksSets()
    {
      return $this->SitelinksSets;
    }

    /**
     * @param SitelinksSetGetItem $SitelinksSets
     * @return \eLama\DirectApiV5\Dto\Sitelink\GetResponse
     */
    public function setSitelinksSets(SitelinksSetGetItem $SitelinksSets)
    {
      $this->SitelinksSets = $SitelinksSets;
      return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getSitelinksSets();
    }
}
