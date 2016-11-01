<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ActionResult;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ArchiveResponse
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $ArchiveResults
     */
    private $ArchiveResults;

    /**
     * @param ActionResult[] $ArchiveResults
     */
    public function __construct(array $ArchiveResults)
    {
        $this->ArchiveResults = $ArchiveResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getArchiveResults()
    {
        return $this->ArchiveResults;
    }

    /**
     * @param ActionResult[] $ArchiveResults
     * @return ArchiveResponse
     */
    public function setArchiveResults(array $ArchiveResults)
    {
        $this->ArchiveResults = $ArchiveResults;

        return $this;
    }
}
