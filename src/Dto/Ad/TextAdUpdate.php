<?php

namespace eLama\DirectApiV5\Dto\Ad;

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

}
