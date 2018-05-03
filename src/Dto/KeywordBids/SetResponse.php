<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SetResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\KeywordBidActionResult")
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\SetResponse
     */
    public function setSetResults(KeywordBidActionResult $SetResults)
    {
      $this->SetResults = $SetResults;
      return $this;
    }

}
