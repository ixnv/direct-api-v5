<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

class GetResult extends GetResultGeneral
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\ClientGetItem>")
     *
     * @var ClientGetItem[] $Clients
     */
    protected $Clients;

    /**
     * @return ClientGetItem[]
     */
    public function getClients()
    {
        return $this->Clients;
    }

    /**
     * @param ClientGetItem[] $Clients
     * @return self
     */
    public function setClients(array $Clients = null)
    {
        $this->Clients = $Clients;
    
        return $this;
    }

    /**
     * @return ClientGetItem[]
     */
    public function getItems()
    {
        return $this->getClients();
    }
}
