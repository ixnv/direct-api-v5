<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class AgencyClientUpdateItem extends ClientUpdateItem
{
    /**
     * @var int $ClientId
     */
    protected $ClientId;

    /**
     * @var GrantItem[] $Grants
     */
    protected $Grants;

    /**
     * @param int $clientId
     */
    public function __construct($clientId)
    {
        $this->ClientId = $clientId;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->ClientId;
    }

    /**
     * @param int $ClientId
     * @return self
     */
    public function setClientId($ClientId)
    {
        $this->ClientId = $ClientId;
    
        return $this;
    }

    /**
     * @return GrantItem[]
     */
    public function getGrants()
    {
        return $this->Grants;
    }

    /**
     * @param GrantItem[] $Grants
     * @return self
     */
    public function setGrants(array $Grants = null)
    {
        $this->Grants = $Grants;
    
        return $this;
    }
}
