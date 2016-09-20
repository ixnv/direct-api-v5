<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ContextCoverage
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Bids\ContextCoverageItem>")
     *
     * @var ContextCoverageItem[] $Items
     */
    private $Items;

    /**
     * @return ContextCoverageItem[]
     */
    public function getItems()
    {
      return $this->Items;
    }

    /**
     * @param ContextCoverageItem[] $Items
     * @return \eLama\DirectApiV5\Dto\Bids\ContextCoverage
     */
    public function setItems(array $Items = null)
    {
      $this->Items = $Items;
      return $this;
    }

}
