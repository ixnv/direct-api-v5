<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TimeTargetingOnPublicHolidays
{

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $SuspendOnHolidays
     */
    private $SuspendOnHolidays;

    /**
     * @JMS\Type("integer")
     *
     * @var int $BidPercent
     */
    private $BidPercent;

    /**
     * @JMS\Type("integer")
     *
     * @var int $StartHour
     */
    private $StartHour;

    /**
     * @JMS\Type("integer")
     *
     * @var int $EndHour
     */
    private $EndHour;

    /**
     * @param YesNoEnum $SuspendOnHolidays
     */
    public function __construct($SuspendOnHolidays = null)
    {
      $this->SuspendOnHolidays = $SuspendOnHolidays;
    }

    /**
     * @return YesNoEnum
     */
    public function getSuspendOnHolidays()
    {
      return $this->SuspendOnHolidays;
    }

    /**
     * @param YesNoEnum $SuspendOnHolidays
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingOnPublicHolidays
     */
    public function setSuspendOnHolidays($SuspendOnHolidays)
    {
      $this->SuspendOnHolidays = $SuspendOnHolidays;
      return $this;
    }

    /**
     * @return int
     */
    public function getBidPercent()
    {
      return $this->BidPercent;
    }

    /**
     * @param int $BidPercent
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingOnPublicHolidays
     */
    public function setBidPercent($BidPercent = null)
    {
      $this->BidPercent = $BidPercent;
      return $this;
    }

    /**
     * @return int
     */
    public function getStartHour()
    {
      return $this->StartHour;
    }

    /**
     * @param int $StartHour
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingOnPublicHolidays
     */
    public function setStartHour($StartHour = null)
    {
      $this->StartHour = $StartHour;
      return $this;
    }

    /**
     * @return int
     */
    public function getEndHour()
    {
      return $this->EndHour;
    }

    /**
     * @param int $EndHour
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingOnPublicHolidays
     */
    public function setEndHour($EndHour = null)
    {
      $this->EndHour = $EndHour;
      return $this;
    }

}
