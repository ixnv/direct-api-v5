<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\DailyBudgetModeEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DailyBudget
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Amount
     */
    private $Amount;

    /**
     * @JMS\Type("string")
     *
     * @var DailyBudgetModeEnum $Mode
     */
    private $Mode;

    /**
     * @param int $Amount
     * @param string $Mode see DailyBudgetModeEnum
     */
    public function __construct($Amount, $Mode)
    {
      $this->Amount = $Amount;
      $this->Mode = $Mode;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
      return $this->Amount;
    }

    /**
     * @param int $Amount
     * @return \eLama\DirectApiV5\Dto\Campaign\DailyBudget
     */
    public function setAmount($Amount)
    {
      $this->Amount = $Amount;
      return $this;
    }

    /**
     * @return DailyBudgetModeEnum
     */
    public function getMode()
    {
      return $this->Mode;
    }

    /**
     * @param DailyBudgetModeEnum $Mode
     * @return \eLama\DirectApiV5\Dto\Campaign\DailyBudget
     */
    public function setMode($Mode)
    {
      $this->Mode = $Mode;
      return $this;
    }

}
