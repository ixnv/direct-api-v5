<?php

namespace eLama\DirectApiV5\Dto\Client\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class ClientFieldEnum extends BaseEnum
{
    const __default = 'AccountQuality';

    const AccountQuality = 'AccountQuality';
    const Archived = 'Archived';
    const ClientId = 'ClientId';
    const ClientInfo = 'ClientInfo';
    const CountryId = 'CountryId';
    const CreatedAt = 'CreatedAt';
    const Currency = 'Currency';
    const Grants = 'Grants';
    const Login = 'Login';
    const Notification = 'Notification';
    const OverdraftSumAvailable = 'OverdraftSumAvailable';
    const Phone = 'Phone';
    const Representatives = 'Representatives';
    const Restrictions = 'Restrictions';
    const Settings = 'Settings';
    const Type = 'Type';
    const VatRate = 'VatRate';
}
