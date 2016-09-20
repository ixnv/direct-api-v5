<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SearchPrices
{

    /**
     * @JMS\Type("string")
     *
     * @var PositionEnum $Position
     */
    private $Position;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Price
     */
    private $Price;

    /**
     * @return PositionEnum
     */
    public function getPosition()
    {
      return $this->Position;
    }

    /**
     * @param PositionEnum $Position
     * @return \eLama\DirectApiV5\Dto\Bids\SearchPrices
     */
    public function setPosition($Position = null)
    {
      $this->Position = $Position;
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
     * @return \eLama\DirectApiV5\Dto\Bids\SearchPrices
     */
    public function setPrice($Price = null)
    {
      $this->Price = $Price;
      return $this;
    }

}
