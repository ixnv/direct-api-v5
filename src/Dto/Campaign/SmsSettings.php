<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\SmsEventsEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SmsSettings
{

    /**
     * @JMS\Type("array<string>")
     *
     * @var SmsEventsEnum[] $Events
     */
    private $Events;

    /**
     * @JMS\Type("string")
     *
     * @var string $TimeFrom
     */
    private $TimeFrom;

    /**
     * @JMS\Type("string")
     *
     * @var string $TimeTo
     */
    private $TimeTo;

    /**
     * @return SmsEventsEnum[]
     */
    public function getEvents()
    {
      return $this->Events;
    }

    /**
     * @param SmsEventsEnum[] $Events
     * @return \eLama\DirectApiV5\Dto\Campaign\SmsSettings
     */
    public function setEvents(array $Events = null)
    {
      $this->Events = $Events;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeFrom()
    {
      return $this->TimeFrom;
    }

    /**
     * @param string $TimeFrom
     * @return \eLama\DirectApiV5\Dto\Campaign\SmsSettings
     */
    public function setTimeFrom($TimeFrom = null)
    {
      $this->TimeFrom = $TimeFrom;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimeTo()
    {
      return $this->TimeTo;
    }

    /**
     * @param string $TimeTo
     * @return \eLama\DirectApiV5\Dto\Campaign\SmsSettings
     */
    public function setTimeTo($TimeTo = null)
    {
      $this->TimeTo = $TimeTo;
      return $this;
    }

}
