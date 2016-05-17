<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class StrategyNetworkDefault
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $LimitPercent
     */
    private $LimitPercent;

    /**
     * @JMS\Type("integer")
     *
     * @var int $BidPercent
     */
    private $BidPercent;

    /**
     * @return int
     */
    public function getLimitPercent()
    {
      return $this->LimitPercent;
    }

    /**
     * @param int $LimitPercent
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyNetworkDefault
     */
    public function setLimitPercent($LimitPercent = null)
    {
      $this->LimitPercent = $LimitPercent;
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
     * @return \eLama\DirectApiV5\Dto\Campaign\StrategyNetworkDefault
     */
    public function setBidPercent($BidPercent = null)
    {
      $this->BidPercent = $BidPercent;
      return $this;
    }

}
