<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\General\ActionResultBase;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ClientsActionResult extends ActionResultBase
{
    /**
     * @JMS\Type("integer")
     *
     * @var int $ClientId
     */
    private $ClientId;

    /**
     * @return int
     */
    public function getClientId()
    {
      return $this->ClientId;
    }

    /**
     * @param int $ClientId
     * @return \eLama\DirectApiV5\Dto\KeywordBids\ClientsActionResult
     */
    public function setClientId($ClientId = null)
    {
      $this->ClientId = $ClientId;

      return $this;
    }
}
