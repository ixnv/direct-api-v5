<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdAdd
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
     * @var string $TrackingUrl
     */
    private $TrackingUrl;

    /**
     * @JMS\Type("string")
     *
     * @var MobileAppAdActionEnum $Action
     */
    private $Action;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Ad\MobileAppAdFeatureItem>")
     *
     * @var MobileAppAdFeatureItem[] $Features
     */
    private $Features;

    /**
     * @JMS\Type("string")
     *
     * @var MobAppAgeLabelEnum $AgeLabel
     */
    private $AgeLabel;

    /**
     * @param string $Text
     * @param string $Title
     * @param MobileAppAdActionEnum $Action
     */
    public function __construct($Text = null, $Title = null, $Action = null)
    {
      $this->Text = $Text;
      $this->Title = $Title;
      $this->Action = $Action;
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
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd
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
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd
     */
    public function setTitle($Title)
    {
      $this->Title = $Title;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrackingUrl()
    {
      return $this->TrackingUrl;
    }

    /**
     * @param string $TrackingUrl
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd
     */
    public function setTrackingUrl($TrackingUrl = null)
    {
      $this->TrackingUrl = $TrackingUrl;
      return $this;
    }

    /**
     * @return MobileAppAdActionEnum
     */
    public function getAction()
    {
      return $this->Action;
    }

    /**
     * @param MobileAppAdActionEnum $Action
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd
     */
    public function setAction($Action)
    {
      $this->Action = $Action;
      return $this;
    }

    /**
     * @return MobileAppAdFeatureItem[]
     */
    public function getFeatures()
    {
      return $this->Features;
    }

    /**
     * @param MobileAppAdFeatureItem[] $Features
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd
     */
    public function setFeatures(array $Features = null)
    {
      $this->Features = $Features;
      return $this;
    }

    /**
     * @return MobAppAgeLabelEnum
     */
    public function getAgeLabel()
    {
      return $this->AgeLabel;
    }

    /**
     * @param MobAppAgeLabelEnum $AgeLabel
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdAdd
     */
    public function setAgeLabel($AgeLabel = null)
    {
      $this->AgeLabel = $AgeLabel;
      return $this;
    }

}
