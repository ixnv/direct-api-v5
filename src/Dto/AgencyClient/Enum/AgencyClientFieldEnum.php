<?php

namespace eLama\DirectApiV5\Dto\AgencyClient\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AgencyClientFieldEnum extends BaseEnum
{
    const __default = 'AccountQuality';

    const ACCOUNT_QUALITY = 'AccountQuality';
    const ARCHIVED = 'Archived';
    const CLIENT_ID = 'ClientId';
    const CLIENT_INFO = 'ClientInfo';
    const COUNTRY_ID = 'CountryId';
    const CREATED_AT = 'CreatedAt';
    const CURRENCY = 'Currency';
    const GRANTS = 'Grants';
    const LOGIN = 'Login';
    const NOTIFICATION = 'Notification';
    const OVERDRAFT_SUM_AVAILABLE = 'OverdraftSumAvailable';
    const PHONE = 'Phone';
    const REPRESENTATIVES = 'Representatives';
    const RESTRICTIONS = 'Restrictions';
    const SETTINGS = 'Settings';
    const TYPE = 'Type';
    const VAT_RATE = 'VatRate';
}
