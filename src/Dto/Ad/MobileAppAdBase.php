<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class MobileAppAdBase
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
     * @var string $Text
     */
    private $Text;

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
     * @return string
     */
    public function getTitle()
    {
      return $this->Title;
    }

    /**
     * @param string $Title
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdBase
     */
    public function setTitle($Title = null)
    {
      $this->Title = $Title;
      return $this;
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
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdBase
     */
    public function setText($Text = null)
    {
      $this->Text = $Text;
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
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdBase
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
     * @return \eLama\DirectApiV5\Dto\Ad\MobileAppAdBase
     */
    public function setAction($Action = null)
    {
      $this->Action = $Action;
      return $this;
    }

}
