<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use JMS\Serializer\Annotation as JMS;

class ClientBaseItem
{
    /**
     * @JMS\Type("string")
     *
     * @var string $ClientInfo
     */
    protected $ClientInfo;

    /**
     * @JMS\Type("string")
     *
     * @var string $Phone
     */
    protected $Phone;

    /**
     * @JMS\Type("string")
     *
     * @return string
     */
    public function getClientInfo()
    {
        return $this->ClientInfo;
    }

    /**
     * @param string $ClientInfo
     * @return self
     */
    public function setClientInfo($ClientInfo)
    {
        $this->ClientInfo = $ClientInfo;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @param string $Phone
     * @return self
     */
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;
    
        return $this;
    }
}
