<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class UpdateRequest
{
    /**
     * @var AgencyClientUpdateItem[] $Clients
     */
    private $Clients;

    /**
     * @param AgencyClientUpdateItem[] $clients
     */
    public function __construct(array $clients)
    {
        $this->Clients = $clients;
    }

    /**
     * @return AgencyClientUpdateItem[]
     */
    public function getClients()
    {
        return $this->Clients;
    }

    /**
     * @param AgencyClientUpdateItem[] $Clients
     * @return self
     */
    public function setClients(array $Clients)
    {
        $this->Clients = $Clients;
    
        return $this;
    }
}
