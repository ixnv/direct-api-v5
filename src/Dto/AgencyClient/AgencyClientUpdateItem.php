<?php

namespace eLama\DirectApiV5\AgencyClient;

class AgencyClientUpdateItem extends \eLama\DirectApiV5\GeneralclientsClientUpdateItem
{
    /**
     * @var int $clientId
     */
    protected $clientId;

    /**
     * @var eLama\DirectApiV5\GeneralclientsGrantItem[] $grants
     */
    protected $grants;

    /**
     * @param int $clientId
     */
    public function __construct($clientId)
    {
        parent::__construct();
        $this->clientId = $clientId;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\GeneralclientsGrantItem[]
     */
    public function getGrants()
    {
        return $this->grants;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsGrantItem[] $grants
     * @return self
     */
    public function setGrants(array $grants = null)
    {
        $this->grants = $grants;
    
        return $this;
    }
}
