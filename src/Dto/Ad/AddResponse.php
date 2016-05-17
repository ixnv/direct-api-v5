<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ActionResult")
     *
     * @var ActionResult $AddResults
     */
    private $AddResults;

    /**
     * @param ActionResult $AddResults
     */
    public function __construct(ActionResult $AddResults = null)
    {
      $this->AddResults = $AddResults;
    }

    /**
     * @return ActionResult
     */
    public function getAddResults()
    {
      return $this->AddResults;
    }

    /**
     * @param ActionResult $AddResults
     * @return \eLama\DirectApiV5\Dto\Ad\AddResponse
     */
    public function setAddResults(ActionResult $AddResults)
    {
      $this->AddResults = $AddResults;
      return $this;
    }

}
