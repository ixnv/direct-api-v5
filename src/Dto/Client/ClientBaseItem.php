<?php

namespace eLama\DirectApiV5\Dto\Client;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ClientBaseItem
{

    /**
     * @JMS\Type("string")
     *
     * @var string $ClientInfo
     */
    private $ClientInfo;

    /**
     * @JMS\Type("string")
     *
     * @var string $Phone
     */
    private $Phone;

    /**
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
    public function setClientInfo($ClientInfo = null)
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
    public function setPhone($Phone = null)
    {
      $this->Phone = $Phone;
      return $this;
    }

}
