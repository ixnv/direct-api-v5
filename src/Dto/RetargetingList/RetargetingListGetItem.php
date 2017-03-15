<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class RetargetingListGetItem extends RetargetingListBase
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    protected $Id;

    /**
     * @JMS\Type("string")
     *
     * @var string $IsAvailable YesNoEnum
     */
    protected $IsAvailable;

    /**
     * @JMS\Type("string")
     *
     * @var string $Scope RetargetingListScopeEnum
     */
    protected $Scope;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return self
     */
    public function setId($Id)
    {
        $this->Id = $Id;
    
        return $this;
    }

    /**
     * @return string YesNoEnum
     */
    public function getIsAvailable()
    {
        return $this->IsAvailable;
    }

    /**
     * @param string $IsAvailable YesNoEnum
     * @return self
     */
    public function setIsAvailable($IsAvailable = null)
    {
        $this->IsAvailable = $IsAvailable;
    
        return $this;
    }

    /**
     * @return string RetargetingListScopeEnum
     */
    public function getScope()
    {
        return $this->Scope;
    }

    /**
     * @param string $Scope RetargetingListScopeEnum
     * @return self
     */
    public function setScope($Scope = null)
    {
        $this->Scope = $Scope;
    
        return $this;
    }
}
