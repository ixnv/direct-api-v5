<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Network
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Bid
     */
    private $Bid;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\Coverage")
     *
     * @var Coverage $Coverage
     */
    private $Coverage;

    /**
     * @return int
     */
    public function getBid()
    {
      return $this->Bid;
    }

    /**
     * @param int $Bid
     * @return \eLama\DirectApiV5\Dto\Keywordbids\Network
     */
    public function setBid(int $Bid = null)
    {
      $this->Bid = $Bid;
      return $this;
    }

    /**
     * @return Coverage
     */
    public function getCoverage()
    {
      return $this->Coverage;
    }

    /**
     * @param Coverage $Coverage
     * @return \eLama\DirectApiV5\Dto\Keywordbids\Network
     */
    public function setCoverage(Coverage $Coverage = null)
    {
      $this->Coverage = $Coverage;
      return $this;
    }

}
