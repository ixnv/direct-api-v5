<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TimeTargetingAdd extends TimeTargetingBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\TimeTargetingOnPublicHolidays")
     *
     * @var TimeTargetingOnPublicHolidays $HolidaysSchedule
     */
    private $HolidaysSchedule;

    /**
     * @param YesNoEnum $ConsiderWorkingWeekends
     */
    public function __construct($ConsiderWorkingWeekends = null)
    {
      parent::__construct($ConsiderWorkingWeekends);
    }

    /**
     * @return TimeTargetingOnPublicHolidays
     */
    public function getHolidaysSchedule()
    {
      return $this->HolidaysSchedule;
    }

    /**
     * @param TimeTargetingOnPublicHolidays $HolidaysSchedule
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingAdd
     */
    public function setHolidaysSchedule(TimeTargetingOnPublicHolidays $HolidaysSchedule = null)
    {
      $this->HolidaysSchedule = $HolidaysSchedule;
      return $this;
    }

}
