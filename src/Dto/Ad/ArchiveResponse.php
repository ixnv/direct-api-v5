<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\ActionResult;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ArchiveResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\ActionResult")
     *
     * @var ActionResult $ArchiveResults
     */
    private $ArchiveResults;

    /**
     * @param ActionResult $ArchiveResults
     */
    public function __construct(ActionResult $ArchiveResults = null)
    {
      $this->ArchiveResults = $ArchiveResults;
    }

    /**
     * @return ActionResult
     */
    public function getArchiveResults()
    {
      return $this->ArchiveResults;
    }

    /**
     * @param ActionResult $ArchiveResults
     * @return \eLama\DirectApiV5\Dto\Ad\ArchiveResponse
     */
    public function setArchiveResults(ActionResult $ArchiveResults)
    {
      $this->ArchiveResults = $ArchiveResults;
      return $this;
    }

}
