<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SharedAccountFundsParam
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Refund
     */
    private $Refund;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Spend
     */
    private $Spend;

    /**
     * @return int
     */
    public function getRefund()
    {
      return $this->Refund;
    }

    /**
     * @param int $Refund
     * @return \eLama\DirectApiV5\Dto\Campaign\SharedAccountFundsParam
     */
    public function setRefund($Refund = null)
    {
      $this->Refund = $Refund;
      return $this;
    }

    /**
     * @return int
     */
    public function getSpend()
    {
      return $this->Spend;
    }

    /**
     * @param int $Spend
     * @return \eLama\DirectApiV5\Dto\Campaign\SharedAccountFundsParam
     */
    public function setSpend($Spend = null)
    {
      $this->Spend = $Spend;
      return $this;
    }

}
