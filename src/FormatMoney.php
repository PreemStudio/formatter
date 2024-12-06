<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;

final class FormatMoney
{
    public static function execute(float|int|string $amount, string $currency): string
    {
        if (\is_float($amount)) {
            $amount = (int) ($amount * 100);
        }

        $money = new Money($amount, new Currency($currency));
        $isoCurrencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
        $intlMoneyFormatter = new IntlMoneyFormatter($numberFormatter, $isoCurrencies);

        return $intlMoneyFormatter->format($money);
    }
}
