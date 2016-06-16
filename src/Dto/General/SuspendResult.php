<?php

namespace eLama\DirectApiV5\Dto\General;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SuspendResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $SuspendResults
     */
    private $SuspendResults;

    public function __construct(array $SuspendResults = null)
    {
        $this->SuspendResults = $SuspendResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getSuspendResults()
    {
        return $this->SuspendResults ?: [];
    }

    /**
     * @param ActionResult[] $SuspendResults
     * @return $this
     */
    public function setSuspendResults(array $SuspendResults)
    {
        $this->SuspendResults = $SuspendResults;

        return $this;
    }
}
