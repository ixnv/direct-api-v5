<?php

namespace eLama\DirectApiV5\Dto\General;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ResumeResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult[] $SuspendResults
     */
    private $ResumeResults;

    public function __construct(array $ResumeResults = null)
    {
        $this->ResumeResults = $ResumeResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getResumeResults()
    {
        return $this->ResumeResults ?: [];
    }

    /**
     * @param ActionResult[] $ResumeResults
     * @return $this
     */
    public function setResumeResults(array $ResumeResults)
    {
        $this->ResumeResults = $ResumeResults;

        return $this;
    }
}
