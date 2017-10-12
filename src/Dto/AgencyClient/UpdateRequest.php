<?php

namespace eLama\DirectApiV5\AgencyClient;

class UpdateRequest
{
    /**
     * @var eLama\DirectApiV5\AgencyClient\AgencyClientUpdateItem[] $clients
     */
    protected $clients;

    /**
     * @param eLama\DirectApiV5\AgencyClient\AgencyClientUpdateItem[] $clients
     */
    public function __construct(array $clients)
    {
        $this->clients = $clients;
    }

    /**
     * @return eLama\DirectApiV5\AgencyClient\AgencyClientUpdateItem[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param eLama\DirectApiV5\AgencyClient\AgencyClientUpdateItem[] $clients
     * @return self
     */
    public function setClients(array $clients)
    {
        $this->clients = $clients;
    
        return $this;
    }
}
