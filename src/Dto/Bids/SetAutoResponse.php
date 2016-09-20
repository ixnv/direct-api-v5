<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SetAutoResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Bids\BidActionResult")
     *
     * @var BidActionResult $SetAutoResults
     */
    private $SetAutoResults;

    /**
     * @param BidActionResult $SetAutoResults
     */
    public function __construct(BidActionResult $SetAutoResults = null)
    {
      $this->SetAutoResults = $SetAutoResults;
    }

    /**
     * @return BidActionResult
     */
    public function getSetAutoResults()
    {
      return $this->SetAutoResults;
    }

    /**
     * @param BidActionResult $SetAutoResults
     * @return \eLama\DirectApiV5\Dto\Bids\SetAutoResponse
     */
    public function setSetAutoResults(BidActionResult $SetAutoResults)
    {
      $this->SetAutoResults = $SetAutoResults;
      return $this;
    }

}
