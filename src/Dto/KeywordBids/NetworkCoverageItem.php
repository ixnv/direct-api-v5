<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class NetworkCoverageItem
{

    /**
     * @JMS\Type("double")
     *
     * @var float $Probability
     */
    private $Probability;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Bid
     */
    private $Bid;

    /**
     * @param float $Probability
     * @param int $Bid
     */
    public function __construct(float $Probability = null, int $Bid = null)
    {
      $this->Probability = $Probability;
      $this->Bid = $Bid;
    }

    /**
     * @return float
     */
    public function getProbability()
    {
      return $this->Probability;
    }

    /**
     * @param float $Probability
     * @return \eLama\DirectApiV5\Dto\Keywordbids\NetworkCoverageItem
     */
    public function setProbability(float $Probability)
    {
      $this->Probability = $Probability;
      return $this;
    }

    /**
     * @return int
     */
    public function getBid()
    {
      return $this->Bid;
    }

    /**
     * @param int $Bid
     * @return \eLama\DirectApiV5\Dto\Keywordbids\NetworkCoverageItem
     */
    public function setBid(int $Bid)
    {
      $this->Bid = $Bid;
      return $this;
    }

}
