<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class TextAdGet extends TextAdGetBase
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Text
     */
    private $Text;

    /**
     * @JMS\Type("string")
     *
     * @var string $Title
     */
    private $Title;

    /**
     * @JMS\Type("string")
     *
     * @var string $Title2
     */
    private $Title2;

    /**
     * @JMS\Type("string")
     *
     * @var string $Href
     */
    private $Href;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Mobile
     */
    private $Mobile;

    /**
     * @JMS\Type("string")
     *
     * @var string $DisplayDomain
     */
    private $DisplayDomain;

    /**
     * @JMS\Type("string")
     *
     * @var string $DisplayUrlPath
     */
    private $DisplayUrlPath;

    /**
     * @return string
     */
    public function getText()
    {
      return $this->Text;
    }

    /**
     * @param string $Text
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGet
     */
    public function setText($Text = null)
    {
      $this->Text = $Text;
      return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
      return $this->Title;
    }

    /**
     * @return string|null
     */
    public function getTitle2()
    {
        return $this->Title2;
    }

    /**
     * @param string|null $Title2
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGet
     */
    public function setTitle2($Title2 = null)
    {
        $this->Title2 = $Title2;

        return $this;
    }

    /**
     * @param string $Title
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGet
     */
    public function setTitle($Title = null)
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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGet
     */
    public function setHref($Href = null)
    {
      $this->Href = $Href;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getMobile()
    {
      return $this->Mobile;
    }

    /**
     * @param YesNoEnum $Mobile
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGet
     */
    public function setMobile($Mobile = null)
    {
      $this->Mobile = $Mobile;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisplayDomain()
    {
      return $this->DisplayDomain;
    }

    /**
     * @param string $DisplayDomain
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdGet
     */
    public function setDisplayDomain($DisplayDomain = null)
    {
      $this->DisplayDomain = $DisplayDomain;
      return $this;
    }

    /**
     * @return string
     */
    public function getDisplayUrlPath()
    {
        return $this->DisplayUrlPath;
    }

    /**
     * @param string $DisplayUrlPath
     */
    public function setDisplayUrlPath($DisplayUrlPath)
    {
        $this->DisplayUrlPath = $DisplayUrlPath;
    }
}
