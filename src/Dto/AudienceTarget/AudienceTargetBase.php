<?php

namespace eLama\DirectApiV5\Dto\AudienceTarget;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AudienceTargetBase
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $ContextBid
     */
    protected $ContextBid;

    /**
     * @JMS\Type("string")
     *
     * @var string $StrategyPriority PriorityEnum
     */
    protected $StrategyPriority;

    /**
     * @return int
     */
    public function getContextBid()
    {
        return $this->ContextBid;
    }

    /**
     * @param int $ContextBid
     * @return self
     */
    public function setContextBid($ContextBid)
    {
        $this->ContextBid = $ContextBid;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getStrategyPriority()
    {
        return $this->StrategyPriority;
    }

    /**
     * @param string $StrategyPriority PriorityEnum
     * @return self
     */
    public function setStrategyPriority($StrategyPriority = null)
    {
        $this->StrategyPriority = $StrategyPriority;
    
        return $this;
    }
}
