<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class GrantItem
{
    /**
     * @var string $Privilege
     */
    protected $Privilege;

    /**
     * @var string $Value
     */
    protected $Value;

    /**
     * @param string $privilege
     * @param string $value
     */
    public function __construct($privilege, $value)
    {
        $this->Privilege = $privilege;
        $this->Value = $value;
    }

    /**
     * @return string
     */
    public function getPrivilege()
    {
        return $this->Privilege;
    }

    /**
     * @param string $Privilege
     * @return self
     */
    public function setPrivilege($Privilege)
    {
        $this->Privilege = $Privilege;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->Value;
    }

    /**
     * @param string $Value
     * @return self
     */
    public function setValue($Value)
    {
        $this->Value = $Value;
    
        return $this;
    }
}
