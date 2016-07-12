<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SitelinksSetGetItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Sitelink\Sitelink>")
     *
     * @var Sitelink[] $Sitelinks
     */
    private $Sitelinks;

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Sitelink\SitelinksSetGetItem
     */
    public function setId($Id = null)
    {
      $this->Id = $Id;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Sitelink\SitelinksSetGetItem
     */
    public function setSitelinks(array $Sitelinks = null)
    {
      $this->Sitelinks = $Sitelinks;
      return $this;
    }

}
