<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class DeleteResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdExtensions\ActionResult")
     *
     * @var ActionResult $DeleteResults
     */
    private $DeleteResults;

    /**
     * @param ActionResult $DeleteResults
     */
    public function __construct(ActionResult $DeleteResults = null)
    {
      $this->DeleteResults = $DeleteResults;
    }

    /**
     * @return ActionResult
     */
    public function getDeleteResults()
    {
      return $this->DeleteResults;
    }

    /**
     * @param ActionResult $DeleteResults
     * @return DeleteResponse
     */
    public function setDeleteResults(ActionResult $DeleteResults)
    {
      $this->DeleteResults = $DeleteResults;
      return $this;
    }

}
