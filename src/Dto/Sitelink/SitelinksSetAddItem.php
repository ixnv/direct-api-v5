<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SitelinksSetAddItem
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Sitelink\Sitelink>")
     *
     * @var Sitelink[] $Sitelinks
     */
    private $Sitelinks;

    /**
     * @param Sitelink[] $Sitelinks
     */
    public function __construct(array $Sitelinks = null)
    {
      $this->Sitelinks = $Sitelinks;
    }

    /**
     * @return Sitelink[]
     */
    public function getSitelinks()
    {
      return $this->Sitelinks;
    }

    /**
     * @param Sitelink[] $Sitelinks
     * @return \eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem
     */
    public function setSitelinks(array $Sitelinks)
    {
      $this->Sitelinks = $Sitelinks;
      return $this;
    }

}
