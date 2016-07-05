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
    public function setEmail($Email)
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
     * @param $CheckPositionInterval string see CheckPositionIntervalEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setCheckPositionInterval($CheckPositionInterval)
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
    public function setWarningBalance($WarningBalance)
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
     * @param string $SendAccountNews see YesNoEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setSendAccountNews($SendAccountNews)
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
     * @param string $SendWarnings see YesNoEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\EmailSettings
     */
    public function setSendWarnings($SendWarnings)
    {
      $this->SendWarnings = $SendWarnings;
      return $this;
    }

}
