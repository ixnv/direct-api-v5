<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ContextCoverageItem
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
     * @var int $Price
     */
    private $Price;

    /**
     * @param float $Probability
     * @param int $Price
     */
    public function __construct($Probability = null, $Price = null)
    {
      $this->Probability = $Probability;
      $this->Price = $Price;
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
     * @return \eLama\DirectApiV5\Dto\Bids\ContextCoverageItem
     */
    public function setProbability($Probability)
    {
      $this->Probability = $Probability;
      return $this;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
      return $this->Price;
    }

    /**
     * @param int $Price
     * @return \eLama\DirectApiV5\Dto\Bids\ContextCoverageItem
     */
    public function setPrice($Price)
    {
      $this->Price = $Price;
      return $this;
    }
}
