<?php
namespace eLama\DirectApiV5\Dto\General;


use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ActionResult>")
     *
     * @var ActionResult $AddResults
     */
    private $AddResults;

    /**
     * @param ActionResult[] $AddResults
     */
    public function __construct(array $AddResults = null)
    {
        $this->AddResults = $AddResults;
    }

    /**
     * @return ActionResult[]
     */
    public function getAddResults()
    {
        return $this->AddResults ?: [];
    }

    /**
     * @param ActionResult[] $AddResults
     * @return $this
     */
    public function setAddResults(array $AddResults)
    {
        $this->AddResults = $AddResults;
        return $this;
    }

}
