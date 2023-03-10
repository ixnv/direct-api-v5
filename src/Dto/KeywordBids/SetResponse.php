<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SetResponse
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\KeywordBids\KeywordBidActionResult")
     *
     * @var KeywordBidActionResult $SetResults
     */
    private $SetResults;

    /**
     * @param KeywordBidActionResult $SetResults
     */
    public function __construct(KeywordBidActionResult $SetResults = null)
    {
      $this->SetResults = $SetResults;
    }

    /**
     * @return KeywordBidActionResult
     */
    public function getSetResults()
    {
      return $this->SetResults;
    }

    /**
     * @param KeywordBidActionResult $SetResults
     * @return \eLama\DirectApiV5\Dto\KeywordBids\SetResponse
     */
    public function setSetResults(KeywordBidActionResult $SetResults)
    {
      $this->SetResults = $SetResults;

      return $this;
    }
}
