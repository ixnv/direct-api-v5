<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class KeywordBidSearchFieldEnum extends BaseEnum
{
    const __default = 'Bid';

    const Bid = 'Bid';
    const AuctionBids = 'AuctionBids';
}
