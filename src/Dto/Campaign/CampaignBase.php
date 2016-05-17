<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignBase
{

    /**
     * @JMS\Type("string")
     *
     * @var string $ClientInfo
     */
    private $ClientInfo;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\Notification")
     *
     * @var Notification $Notification
     */
    private $Notification;

    /**
     * @JMS\Type("string")
     *
     * @var string $TimeZone
     */
    private $TimeZone;

    /**
     * @return string
     */
    public function getClientInfo()
    {
      return $this->ClientInfo;
    }

    /**
     * @param string $ClientInfo
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignBase
     */
    public function setClientInfo($ClientInfo = null)
    {
      $this->ClientInfo = $ClientInfo;
      return $this;
    }

    /**
     * @return Notification
     */
    public function getNotification()
    {
      return $this->Notification;
    }

    /**
     * @param Notification $Notification
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignBase
     */
    public function setNotification(Notification $Notification = null)
    {
      $this->Notification = $Notification;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
      return $this->TimeZone;
    }

    /**
     * @param string $TimeZone
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignBase
     */
    public function setTimeZone($TimeZone = null)
    {
      $this->TimeZone = $TimeZone;
      return $this;
    }

}
