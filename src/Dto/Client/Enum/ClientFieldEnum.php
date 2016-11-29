<?php

namespace eLama\DirectApiV5\Dto\Client\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class ClientFieldEnum extends BaseEnum
{
    const __DEFAULT = 'ACCOUNT_QUALITY';

    const ACCOUNT_QUALITY = 'ACCOUNT_QUALITY';
    const ARCHIVED = 'ARCHIVED';
    const CLIENT_ID = 'CLIENT_ID';
    const CLIENT_INFO = 'CLIENT_INFO';
    const COUNTRY_ID = 'COUNTRY_ID';
    const CREATED_AT = 'CREATED_AT';
    const CURRENCY = 'CURRENCY';
    const GRANTS = 'GRANTS';
    const LOGIN = 'LOGIN';
    const NOTIFICATION = 'NOTIFICATION';
    const OVERDRAFT_SUM_AVAILABLE = 'OVERDRAFT_SUM_AVAILABLE';
    const PHONE = 'PHONE';
    const REPRESENTATIVES = 'REPRESENTATIVES';
    const RESTRICTIONS = 'RESTRICTIONS';
    const SETTINGS = 'SETTINGS';
    const TYPE = 'TYPE';
    const VAT_RATE = 'VAT_RATE';
}
