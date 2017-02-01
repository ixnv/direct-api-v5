<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Client\ClientGetItem>")
     *
     * @var ClientGetItem[]
     */
    private $Clients;

    /**
     * @param ClientGetItem[] $Clients
     */
    public function __construct(array $Clients = null)
    {
        $this->Clients = $Clients;
    }

    /**
     * @return ClientGetItem[]
     */
    public function getClients()
    {
        if ($this->Clients === null) {
            return [];
        }

        return $this->Clients;
    }

    /**
     * @param ClientGetItem[] $Clients
     * @return GetResponseGeneral
     */
    public function setClients(array $Clients)
    {
        $this->Clients = $Clients;

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
