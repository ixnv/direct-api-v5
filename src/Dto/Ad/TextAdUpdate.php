<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\AgeLabelEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class TextAdUpdate extends TextAdUpdateBase
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
     * @var AgeLabelEnum $AgeLabel
     */
    private $AgeLabel;

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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdUpdate
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
     * @param string $Title
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdUpdate
     */
    public function setTitle($Title = null)
    {
      $this->Title = $Title;
      return $this;
    }

    /**
     * @return string
     */
    public function getTitle2()
    {
        return $this->Title2;
    }

    /**
     * @param string $Title2
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdUpdate
     */
    public function setTitle2($Title2 = null)
    {
        $this->Title2 = $Title2;
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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdUpdate
     */
    public function setHref($Href = null)
    {
      $this->Href = $Href;

      return $this;
    }

    /**
     * @return AgeLabelEnum
     */
    public function getAgeLabel()
    {
      return $this->AgeLabel;
    }

    /**
     * @param AgeLabelEnum $AgeLabel
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdUpdate
     */
    public function setAgeLabel($AgeLabel = null)
    {
      $this->AgeLabel = $AgeLabel;

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
     * @return \eLama\DirectApiV5\Dto\Ad\TextAdUpdate
     */
    public function setDisplayUrlPath($DisplayUrlPath)
    {
        $this->DisplayUrlPath = $DisplayUrlPath;
        return $this;
    }
}
