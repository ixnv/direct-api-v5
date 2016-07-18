<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\ActionResult;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ModerateResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $ModerateResults
     */
    private $ModerateResults;

    /**
     * ModerateResult constructor.
     *
     * @param \eLama\DirectApiV5\Dto\General\ActionResult[] $ModerateResults
     */
    public function __construct(array $ModerateResults)
    {
        $this->ModerateResults = $ModerateResults;
    }

    /**
     * @return \eLama\DirectApiV5\Dto\General\ActionResult[]
     */
    public function getModerateResults()
    {
        return $this->ModerateResults;
    }

    /**
     * @param \eLama\DirectApiV5\Dto\General\ActionResult[] $ModerateResults
     */
    public function setModerateResults(array $ModerateResults)
    {
        $this->ModerateResults = $ModerateResults;

        return $this;
    }
}
