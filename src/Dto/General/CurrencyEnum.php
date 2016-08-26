<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

class CurrencyEnum extends BaseEnum
{
    const __default = 'YND_FIXED';
    const YND_FIXED = 'YND_FIXED';
    const RUB = 'RUB';
    const CHF = 'CHF';
    const EUR = 'EUR';
    const KZT = 'KZT';
    const aTRY = 'TRY';
    const UAH = 'UAH';
    const USD = 'USD';
}