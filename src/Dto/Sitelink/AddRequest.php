<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem>")
     *
     * @var SitelinksSetAddItem[] $SitelinksSets
     */
    private $SitelinksSets;

    /**
     * @param SitelinksSetAddItem[] $SitelinksSets
     */
    public function __construct(array $SitelinksSets = null)
    {
      $this->SitelinksSets = $SitelinksSets;
    }

    /**
     * @return SitelinksSetAddItem[]
     */
    public function getSitelinksSets()
    {
      return $this->SitelinksSets;
    }

    /**
     * @param SitelinksSetAddItem[] $SitelinksSets
     * @return self
     */
    public function setSitelinksSets(array $SitelinksSets)
    {
      $this->SitelinksSets = $SitelinksSets;

      return $this;
    }

}
