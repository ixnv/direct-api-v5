<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\KeywordBids\KeywordBidGetItem>")
     *
     * @var KeywordBidGetItem[]
     */
    private $KeywordBids;

    /**
     * @param KeywordBidGetItem[] $KeywordBids
     */
    public function __construct(array $KeywordBids = null)
    {
        $this->KeywordBids = $KeywordBids;
    }

    /**
     * @return KeywordBidGetItem[]
     */
    public function getKeywordBids()
    {
        if ($this->KeywordBids === null) {
            return [];
        }

        return $this->KeywordBids;
    }

    /**
     * @param KeywordBidGetItem[] $KeywordBids
     * @return GetResponseGeneral
     */
    public function setKeywordBids(array $KeywordBids)
    {
        $this->KeywordBids = $KeywordBids;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getKeywordBids();
    }
}
