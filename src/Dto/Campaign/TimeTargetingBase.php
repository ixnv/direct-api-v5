<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfString;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TimeTargetingBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfString")
     *
     * @var ArrayOfString $Schedule
     */
    private $Schedule;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $ConsiderWorkingWeekends
     */
    private $ConsiderWorkingWeekends;

    /**
     * @param YesNoEnum $ConsiderWorkingWeekends
     */
    public function __construct($ConsiderWorkingWeekends = null)
    {
      $this->ConsiderWorkingWeekends = $ConsiderWorkingWeekends;
    }

    /**
     * @return ArrayOfString
     */
    public function getSchedule()
    {
      return $this->Schedule;
    }

    /**
     * @param ArrayOfString $Schedule
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingBase
     */
    public function setSchedule(ArrayOfString $Schedule = null)
    {
      $this->Schedule = $Schedule;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getConsiderWorkingWeekends()
    {
      return $this->ConsiderWorkingWeekends;
    }

    /**
     * @param YesNoEnum $ConsiderWorkingWeekends
     * @return \eLama\DirectApiV5\Dto\Campaign\TimeTargetingBase
     */
    public function setConsiderWorkingWeekends($ConsiderWorkingWeekends)
    {
      $this->ConsiderWorkingWeekends = $ConsiderWorkingWeekends;
      return $this;
    }

}
