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
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Sitelink\SitelinksSetGetItem>")
     *
     * @var SitelinksSetGetItem[] $SitelinksSets
     */
    private $SitelinksSets = [];

    /**
     * @param SitelinksSetGetItem[] $SitelinksSets
     */
    public function __construct(array $SitelinksSets = null)
    {
      $this->SitelinksSets = $SitelinksSets;
    }

    /**
     * @return SitelinksSetGetItem[]
     */
    public function getSitelinksSets()
    {
      return $this->SitelinksSets === null ? [] : $this->SitelinksSets;
    }

    /**
     * @param SitelinksSetGetItem[] $SitelinksSets
     * @return self
     */
    public function setSitelinksSets(array $SitelinksSets)
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
