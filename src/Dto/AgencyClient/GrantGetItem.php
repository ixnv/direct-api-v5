<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class GrantGetItem extends GrantItem
{
    /**
     * @var string $Agency
     */
    protected $Agency;

    /**
     * @param string $privilege
     * @param string $value
     */
    public function __construct($privilege, $value)
    {
        parent::__construct($privilege, $value);
    }

    /**
     * @return string
     */
    public function getAgency()
    {
        return $this->Agency;
    }

    /**
     * @param string $Agency
     * @return self
     */
    public function setAgency($Agency)
    {
        $this->Agency = $Agency;
    
        return $this;
    }
}
