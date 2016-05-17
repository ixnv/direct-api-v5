<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class Notification
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\SmsSettings")
     *
     * @var SmsSettings $SmsSettings
     */
    private $SmsSettings;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\EmailSettings")
     *
     * @var EmailSettings $EmailSettings
     */
    private $EmailSettings;

    /**
     * @return SmsSettings
     */
    public function getSmsSettings()
    {
      return $this->SmsSettings;
    }

    /**
     * @param SmsSettings $SmsSettings
     * @return \eLama\DirectApiV5\Dto\Campaign\Notification
     */
    public function setSmsSettings(SmsSettings $SmsSettings = null)
    {
      $this->SmsSettings = $SmsSettings;
      return $this;
    }

    /**
     * @return EmailSettings
     */
    public function getEmailSettings()
    {
      return $this->EmailSettings;
    }

    /**
     * @param EmailSettings $EmailSettings
     * @return \eLama\DirectApiV5\Dto\Campaign\Notification
     */
    public function setEmailSettings(EmailSettings $EmailSettings = null)
    {
      $this->EmailSettings = $EmailSettings;
      return $this;
    }

}
