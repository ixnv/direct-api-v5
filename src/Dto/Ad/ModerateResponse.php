<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ModerateResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ActionResult")
     *
     * @var ActionResult $ModerateResults
     */
    private $ModerateResults;

    /**
     * @param ActionResult $ModerateResults
     */
    public function __construct(ActionResult $ModerateResults = null)
    {
      $this->ModerateResults = $ModerateResults;
    }

    /**
     * @return ActionResult
     */
    public function getModerateResults()
    {
      return $this->ModerateResults;
    }

    /**
     * @param ActionResult $ModerateResults
     * @return \eLama\DirectApiV5\Dto\Ad\ModerateResponse
     */
    public function setModerateResults(ActionResult $ModerateResults)
    {
      $this->ModerateResults = $ModerateResults;
      return $this;
    }

}
