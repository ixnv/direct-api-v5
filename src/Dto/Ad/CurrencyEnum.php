<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

/**
 * @deprecated не использовать этот класс. Использовать General\CurrencyEnum
 */
class CurrencyEnum
{
    const __default = 'YND_FIXED';
    const YND_FIXED = 'YND_FIXED';
    const RUB = 'RUB';
    const CHF = 'CHF';
    const EUR = 'EUR';
    const KZT = 'KZT';
    const UAH = 'UAH';
    const USD = 'USD';

    const aTRY = 'TRY';
    const TL = 'TRY';
}
