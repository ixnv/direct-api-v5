<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\ActionResultBase;

class ClientsActionResult extends ActionResultBase
{
    /**
     * @var int $ClientId
     */
    protected $ClientId;

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
}
