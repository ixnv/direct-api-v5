<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class ClientBaseItem
{
    /**
     * @var string $clientInfo
     */
    protected $clientInfo;

    /**
     * @var string $phone
     */
    protected $phone;

    /**
     * @return string
     */
    public function getClientInfo()
    {
        return $this->clientInfo;
    }

    /**
     * @param string $clientInfo
     * @return self
     */
    public function setClientInfo($clientInfo)
    {
        $this->clientInfo = $clientInfo;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }
}
