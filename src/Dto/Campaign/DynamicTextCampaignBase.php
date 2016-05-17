<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfInteger;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DynamicTextCampaignBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfInteger")
     *
     * @var ArrayOfInteger $CounterIds
     */
    private $CounterIds;

    /**
     * @return ArrayOfInteger
     */
    public function getCounterIds()
    {
      return $this->CounterIds;
    }

    /**
     * @param ArrayOfInteger $CounterIds
     * @return self
     */
    public function setCounterIds(ArrayOfInteger $CounterIds = null)
    {
      $this->CounterIds = $CounterIds;
      return $this;
    }
}
