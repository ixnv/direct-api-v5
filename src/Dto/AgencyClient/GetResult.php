<?php

namespace eLama\DirectApiV5\AgencyClient;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;

class GetResult extends GetResultGeneral
{
    /**
     * @var eLama\DirectApiV5\GeneralclientsClientGetItem[] $clients
     */
    protected $clients;

    /**
     * @return eLama\DirectApiV5\GeneralclientsClientGetItem[]
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * @param eLama\DirectApiV5\GeneralclientsClientGetItem[] $clients
     * @return self
     */
    public function setClients(array $clients = null)
    {
        $this->clients = $clients;
    
        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getClients();
    }
}
