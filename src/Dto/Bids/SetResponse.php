<?php

namespace eLama\DirectApiV5\Dto\Bids;

use eLama\DirectApiV5\Dto\General\ActionResult;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SetResponse
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Bids\BidActionResult")
     *
     * @var ActionResult $SetResults
     */
    private $SetResults;

    /**
     * @param ActionResult $SetResults
     */
    public function __construct(ActionResult $SetResults = null)
    {
      $this->SetResults = $SetResults;
    }

    /**
     * @return ActionResult
     */
    public function getSetResults()
    {
      return $this->SetResults;
    }

    /**
     * @param ActionResult $SetResults
     * @return \eLama\DirectApiV5\Dto\Bids\SetResponse
     */
    public function setSetResults(ActionResult $SetResults)
    {
      $this->SetResults = $SetResults;
      return $this;
    }
}
