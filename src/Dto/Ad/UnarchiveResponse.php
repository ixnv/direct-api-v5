<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class UnarchiveResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ActionResult")
     *
     * @var ActionResult $UnarchiveResults
     */
    private $UnarchiveResults;

    /**
     * @param ActionResult $UnarchiveResults
     */
    public function __construct(ActionResult $UnarchiveResults = null)
    {
      $this->UnarchiveResults = $UnarchiveResults;
    }

    /**
     * @return ActionResult
     */
    public function getUnarchiveResults()
    {
      return $this->UnarchiveResults;
    }

    /**
     * @param ActionResult $UnarchiveResults
     * @return \eLama\DirectApiV5\Dto\Ad\UnarchiveResponse
     */
    public function setUnarchiveResults(ActionResult $UnarchiveResults)
    {
      $this->UnarchiveResults = $UnarchiveResults;
      return $this;
    }

}
