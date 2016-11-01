<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ActionResult;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class UnarchiveResponse
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $UnarchiveResults
     */
    private $UnarchiveResults;

    /**
     * @param ActionResult[] $UnarchiveResults
     */
    public function __construct(array $UnarchiveResults)
    {
        $this->UnarchiveResults = $UnarchiveResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getUnarchiveResults()
    {
        return $this->UnarchiveResults;
    }

    /**
     * @param ActionResult[] $UnarchiveResults
     * @return \eLama\DirectApiV5\Dto\Campaign\UnarchiveResponse
     */
    public function setUnarchiveResults(array $UnarchiveResults)
    {
        $this->UnarchiveResults = $UnarchiveResults;

        return $this;
    }

}
