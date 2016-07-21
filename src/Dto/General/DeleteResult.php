<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class DeleteResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $DeleteResults
     */
    private $DeleteResults = [];

    /**
     * @param ActionResult[] $DeleteResults
     */
    public function __construct(array $DeleteResults = [])
    {
        $this->DeleteResults = $DeleteResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getDeleteResults()
    {
        return $this->DeleteResults;
    }

    /**
     * @param ActionResult[] $DeleteResults
     * @return $this
     */
    public function setDeleteResults(array $DeleteResults)
    {
        $this->DeleteResults = $DeleteResults;

        return $this;
    }
}
