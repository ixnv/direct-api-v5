<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SuspendResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\ActionResult")
     *
     * @var ActionResult $SuspendResults
     */
    private $SuspendResults;

    /**
     * @param ActionResult $SuspendResults
     */
    public function __construct(ActionResult $SuspendResults = null)
    {
      $this->SuspendResults = $SuspendResults;
    }

    /**
     * @return ActionResult
     */
    public function getSuspendResults()
    {
      return $this->SuspendResults;
    }

    /**
     * @param ActionResult $SuspendResults
     * @return \eLama\DirectApiV5\Dto\Keyword\SuspendResponse
     */
    public function setSuspendResults(ActionResult $SuspendResults)
    {
      $this->SuspendResults = $SuspendResults;
      return $this;
    }

}
