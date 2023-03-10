<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SuspendResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ActionResult")
     *
     * @var ActionResult $SuspendResults
     */
    private $SuspendResults;

    /**
     * @param ActionResult $SuspendResults
     */
    public function __construct(ActionResult $SuspendResults = null)
    {
        $this->SuspendResults = $SuspendResults;
    }

    /**
     * @return ActionResult
     */
    public function getSuspendResults()
    {
        return $this->SuspendResults;
    }

    /**
     * @param ActionResult $SuspendResults
     * @return $this
     */
    public function setSuspendResults(ActionResult $SuspendResults)
    {
        $this->SuspendResults = $SuspendResults;

        return $this;
    }

}
