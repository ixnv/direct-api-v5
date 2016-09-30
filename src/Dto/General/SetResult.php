<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\Bids\BidActionResult;
use JMS\Serializer\Annotation as JMS;

class SetResult
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Bids\BidActionResult>")
     *
     * @var BidActionResult $SetResults
     */
    private $SetResults;

    /**
     * @param BidActionResult[] $SetResults
     */
    public function __construct(array $SetResults)
    {
        $this->SetResults = $SetResults;
    }

    /**
     * @return BidActionResult[]
     */
    public function getSetResults()
    {
        return $this->SetResults;
    }

    /**
     * @param BidActionResult[] $SetResults
     */
    public function setSetResults($SetResults)
    {
        $this->SetResults = $SetResults;
    }
}
