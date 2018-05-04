<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileAppAdActionEnum extends BaseEnum
{
    const __default = 'DOWNLOAD';

    const DOWNLOAD = 'DOWNLOAD';
    const GET = 'GET';
    const INSTALL = 'INSTALL';
    const MORE = 'MORE';
    const OPEN = 'OPEN';
    const UPDATE = 'UPDATE';
    const PLAY = 'PLAY';
    const BUY_AUTODETECT = 'BUY_AUTODETECT';
}
