<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Sitelink
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Title
     */
    private $Title;

    /**
     * @JMS\Type("string")
     *
     * @var string $Href
     */
    private $Href;

    /**
     * @JMS\Type("string")
     *
     * @var string $Description
     */
    private $Description;

    /**
     * @param string $Title
     * @param string $Href
     */
    public function __construct($Title = null, $Href = null)
    {
      $this->Title = $Title;
      $this->Href = $Href;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
      return $this->Title;
    }

    /**
     * @param string $Title
     * @return \eLama\DirectApiV5\Dto\Sitelink\Sitelink
     */
    public function setTitle($Title)
    {
      $this->Title = $Title;
      return $this;
    }

    /**
     * @return string
     */
    public function getHref()
    {
      return $this->Href;
    }

    /**
     * @param string $Href
     * @return \eLama\DirectApiV5\Dto\Sitelink\Sitelink
     */
    public function setHref($Href)
    {
      $this->Href = $Href;
      return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
      return $this->Description;
    }

    /**
     * @param string $Description
     * @return \eLama\DirectApiV5\Dto\Sitelink\Sitelink
     */
    public function setDescription($Description = null)
    {
      $this->Description = $Description;
      return $this;
    }

}
