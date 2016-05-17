<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class EmailSettings
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Email
     */
    private $Email;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CheckPositionInterval
     */
    private $CheckPositionInterval;

    /**
     * @JMS\Type("integer")
     *
     * @var int $WarningBalance
     */
    private $WarningBalance;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $SendAccountNews
     */
    private $SendAccountNews;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $SendWarnings
     */
    private $SendWarnings;

    /**
     * @return string
     */
    public function getEmail()
    {
      return $this->Email;
    }

    /**
     * @param string $Email
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setEmail($Email = null)
    {
      $this->Email = $Email;
      return $this;
    }

    /**
     * @return int
     */
    public function getCheckPositionInterval()
    {
      return $this->CheckPositionInterval;
    }

    /**
     * @param int $CheckPositionInterval
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setCheckPositionInterval($CheckPositionInterval = null)
    {
      $this->CheckPositionInterval = $CheckPositionInterval;
      return $this;
    }

    /**
     * @return int
     */
    public function getWarningBalance()
    {
      return $this->WarningBalance;
    }

    /**
     * @param int $WarningBalance
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setWarningBalance($WarningBalance = null)
    {
      $this->WarningBalance = $WarningBalance;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getSendAccountNews()
    {
      return $this->SendAccountNews;
    }

    /**
     * @param YesNoEnum $SendAccountNews
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setSendAccountNews($SendAccountNews = null)
    {
      $this->SendAccountNews = $SendAccountNews;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getSendWarnings()
    {
      return $this->SendWarnings;
    }

    /**
     * @param YesNoEnum $SendWarnings
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setSendWarnings($SendWarnings = null)
    {
      $this->SendWarnings = $SendWarnings;
      return $this;
    }

}
