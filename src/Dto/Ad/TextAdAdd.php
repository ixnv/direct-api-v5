<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class TextAdAdd extends TextAdAddBase
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
     * @var string $Href
     */
    private $Href;

    /**
     * @JMS\Type("string")
     *
     * @var string $DisplayUrlPath
     */
    private $DisplayUrlPath;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $Mobile
     */
    private $Mobile;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $AdExtensionIds
     */
    private $AdExtensionIds;

    /**
     * @param string $Text
     * @param string $Title
     * @param string $Mobile see YesNoEnum
     */
    public function __construct($Text, $Title, $Mobile)
    {
      $this->Text = $Text;
      $this->Title = $Title;
      $this->Mobile = $Mobile;
    }

    /**
     * @return string
     */
    public function getText()
    {
      return $this->Text;
    }

    /**
     * @param string $Text
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAdd
     */
    public function setText($Text)
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
     * @param string $Title
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAdd
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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAdd
     */
    public function setHref($Href)
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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAdd
     */
    public function setMobile($Mobile)
    {
      $this->Mobile = $Mobile;
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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdAdd
     */
    public function setDisplayUrlPath($DisplayUrlPath)
    {
        $this->DisplayUrlPath = $DisplayUrlPath;
        return $this;
    }

    /**
     * @return array
     */
    public function getAdExtensionIds()
    {
        return $this->AdExtensionIds;
    }

    /**
     * @param array $AdExtensionIds
     */
    public function setAdExtensionIds(array $AdExtensionIds)
    {
        $this->AdExtensionIds = $AdExtensionIds;
    }
}
