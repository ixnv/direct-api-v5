<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class UpdateResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\ActionResult")
     *
     * @var ActionResult $UpdateResults
     */
    private $UpdateResults;

    /**
     * @param ActionResult $UpdateResults
     */
    public function __construct(ActionResult $UpdateResults = null)
    {
      $this->UpdateResults = $UpdateResults;
    }

    /**
     * @return ActionResult
     */
    public function getUpdateResults()
    {
      return $this->UpdateResults;
    }

    /**
     * @param ActionResult $UpdateResults
     * @return \eLama\DirectApiV5\Dto\Keyword\UpdateResponse
     */
    public function setUpdateResults(ActionResult $UpdateResults)
    {
      $this->UpdateResults = $UpdateResults;
      return $this;
    }

}
