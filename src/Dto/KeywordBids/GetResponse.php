<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\KeywordBidGetItem")
     *
     * @var KeywordBidGetItem $KeywordBids
     */
    private $KeywordBids;

    /**
     * @param KeywordBidGetItem $KeywordBids
     */
    public function __construct(KeywordBidGetItem $KeywordBids = null)
    {
      $this->KeywordBids = $KeywordBids;
    }

    /**
     * @return KeywordBidGetItem
     */
    public function getKeywordBids()
    {
      return $this->KeywordBids;
    }

    /**
     * @param KeywordBidGetItem $KeywordBids
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetResponse
     */
    public function setKeywordBids(KeywordBidGetItem $KeywordBids)
    {
      $this->KeywordBids = $KeywordBids;
      return $this;
    }

}
