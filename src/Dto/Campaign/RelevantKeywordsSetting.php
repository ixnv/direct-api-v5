<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\RelevantKeywordsModeEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class RelevantKeywordsSetting
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $BudgetPercent
     */
    private $BudgetPercent;

    /**
     * @JMS\Type("string")
     *
     * @var RelevantKeywordsModeEnum $Mode
     */
    private $Mode;

    /**
     * @JMS\Type("integer")
     *
     * @var int $OptimizeGoalId
     */
    private $OptimizeGoalId;

    /**
     * @return int
     */
    public function getBudgetPercent()
    {
      return $this->BudgetPercent;
    }

    /**
     * @param int $BudgetPercent
     * @return \eLama\DirectApiV5\Dto\Campaign\RelevantKeywordsSetting
     */
    public function setBudgetPercent($BudgetPercent = null)
    {
      $this->BudgetPercent = $BudgetPercent;
      return $this;
    }

    /**
     * @return RelevantKeywordsModeEnum
     */
    public function getMode()
    {
      return $this->Mode;
    }

    /**
     * @param RelevantKeywordsModeEnum $Mode
     * @return \eLama\DirectApiV5\Dto\Campaign\RelevantKeywordsSetting
     */
    public function setMode($Mode = null)
    {
      $this->Mode = $Mode;
      return $this;
    }

    /**
     * @return int
     */
    public function getOptimizeGoalId()
    {
      return $this->OptimizeGoalId;
    }

    /**
     * @param int $OptimizeGoalId
     * @return \eLama\DirectApiV5\Dto\Campaign\RelevantKeywordsSetting
     */
    public function setOptimizeGoalId($OptimizeGoalId = null)
    {
      $this->OptimizeGoalId = $OptimizeGoalId;
      return $this;
    }

}
