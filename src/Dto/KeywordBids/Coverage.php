<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Coverage
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Keywordbids\NetworkCoverageItem>")
     *
     * @var NetworkCoverageItem[] $CoverageItems
     */
    private $CoverageItems;

    /**
     * @return NetworkCoverageItem[]
     */
    public function getCoverageItems()
    {
      return $this->CoverageItems;
    }

    /**
     * @param NetworkCoverageItem[] $CoverageItems
     * @return \eLama\DirectApiV5\Dto\Keywordbids\Coverage
     */
    public function setCoverageItems(array $CoverageItems = null)
    {
      $this->CoverageItems = $CoverageItems;
      return $this;
    }

}
