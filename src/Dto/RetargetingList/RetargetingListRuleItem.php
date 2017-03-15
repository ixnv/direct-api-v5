<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class RetargetingListRuleItem
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\RetargetingList\RetargetingListRuleArgumentItem>")
     *
     * @var RetargetingListRuleArgumentItem[] $Arguments
     */
    protected $Arguments;

    /**
     * @JMS\Type("string")
     *
     * @var string $Operator RetargetingListRuleOperatorEnum
     */
    protected $Operator;

    /**
     * @param RetargetingListRuleArgumentItem[] $arguments
     * @param string $operator RetargetingListRuleOperatorEnum
     */
    public function __construct(array $arguments, $operator)
    {
        $this->Arguments = $arguments;
        $this->Operator = $operator;
    }

    /**
     * @return RetargetingListRuleArgumentItem[]
     */
    public function getArguments()
    {
        return $this->Arguments;
    }

    /**
     * @param RetargetingListRuleArgumentItem[] $Arguments
     * @return self
     */
    public function setArguments(array $Arguments)
    {
        $this->Arguments = $Arguments;
    
        return $this;
    }

    /**
     * @return string RetargetingListRuleOperatorEnum
     */
    public function getOperator()
    {
        return $this->Operator;
    }

    /**
     * @param string $Operator RetargetingListRuleOperatorEnum
     * @return self
     */
    public function setOperator($Operator)
    {
        $this->Operator = $Operator;
    
        return $this;
    }
}
