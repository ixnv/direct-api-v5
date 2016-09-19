<?php

namespace eLama\DirectApiV5\Dto\General;

class CurrencyEnum extends BaseEnum
{
    const __default = 'YND_FIXED';

    const YND_FIXED = 'YND_FIXED';
    const RUB = 'RUB';
    const CHF = 'CHF';
    const EUR = 'EUR';
    const KZT = 'KZT';
    const UAH = 'UAH';
    const USD = 'USD';

    /**
     * @deprecated не использовать константу aTRY, использовать TL
     */
    const aTRY = 'TRY';
    const TL = 'TRY';
}
