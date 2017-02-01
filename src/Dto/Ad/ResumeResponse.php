<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\ActionResult;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ResumeResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ActionResult")
     *
     * @var ActionResult $ResumeResults
     */
    private $ResumeResults;

    /**
     * @param ActionResult $ResumeResults
     */
    public function __construct(ActionResult $ResumeResults = null)
    {
      $this->ResumeResults = $ResumeResults;
    }

    /**
     * @return ActionResult
     */
    public function getResumeResults()
    {
      return $this->ResumeResults;
    }

    /**
     * @param ActionResult $ResumeResults
     * @return \eLama\DirectApiV5\Dto\Ad\ResumeResponse
     */
    public function setResumeResults(ActionResult $ResumeResults)
    {
      $this->ResumeResults = $ResumeResults;
      return $this;
    }

}
