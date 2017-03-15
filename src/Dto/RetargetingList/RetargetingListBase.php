<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class RetargetingListBase
{
    /**
     * @JMS\Type("string")
     *
     * @var string $Name
     */
    protected $Name;

    /**
     * @JMS\Type("string")
     *
     * @var string $Description
     */
    protected $Description;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\RetargetingList\RetargetingListRuleItem>")
     *
     * @var RetargetingListRuleItem[] $Rules
     */
    protected $Rules;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $Name
     * @return self
     */
    public function setName($Name)
    {
        $this->Name = $Name;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     * @return self
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    
        return $this;
    }

    /**
     * @return RetargetingListRuleItem[]
     */
    public function getRules()
    {
        return $this->Rules;
    }

    /**
     * @param RetargetingListRuleItem[] $Rules
     * @return self
     */
    public function setRules(array $Rules = null)
    {
        $this->Rules = $Rules;
    
        return $this;
    }
}
