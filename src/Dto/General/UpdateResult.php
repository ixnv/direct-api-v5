<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class UpdateResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $UpdateResults
     */
    private $UpdateResults = [];

    /**
     * @param ActionResult[] $UpdateResults
     */
    public function __construct(array $UpdateResults = [])
    {
        $this->UpdateResults = $UpdateResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getUpdateResults()
    {
        return $this->UpdateResults;
    }

    /**
     * @param ActionResult[] $UpdateResults
     * @return $this
     */
    public function setUpdateResults(array $UpdateResults)
    {
        $this->UpdateResults = $UpdateResults;

        return $this;
    }
}
