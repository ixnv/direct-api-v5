<?php

namespace eLama\DirectApiV5\Dto\Bids;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class BidFieldEnum extends BaseEnum
{
    const __default = 'KeywordId';
    const KeywordId = 'KeywordId';
    const AdGroupId = 'AdGroupId';
    const CampaignId = 'CampaignId';
    const Bid = 'Bid';
    const ContextBid = 'ContextBid';
    const StrategyPriority = 'StrategyPriority';
    const CompetitorsBids = 'CompetitorsBids';
    const SearchPrices = 'SearchPrices';
    const ContextCoverage = 'ContextCoverage';
    const MinSearchPrice = 'MinSearchPrice';
    const CurrentSearchPrice = 'CurrentSearchPrice';
    const AuctionBids = 'AuctionBids';


}
