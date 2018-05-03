<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class SetRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\KeywordBidSetItem")
     *
     * @var KeywordBidSetItem $KeywordBids
     */
    private $KeywordBids;

    /**
     * @param KeywordBidSetItem $KeywordBids
     */
    public function __construct(KeywordBidSetItem $KeywordBids = null)
    {
      $this->KeywordBids = $KeywordBids;
    }

    /**
     * @return KeywordBidSetItem
     */
    public function getKeywordBids()
    {
      return $this->KeywordBids;
    }

    /**
     * @param KeywordBidSetItem $KeywordBids
     * @return \eLama\DirectApiV5\Dto\Keywordbids\SetRequest
     */
    public function setKeywordBids(KeywordBidSetItem $KeywordBids)
    {
      $this->KeywordBids = $KeywordBids;
      return $this;
    }

}
