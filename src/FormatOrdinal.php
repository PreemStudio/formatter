<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

final class FormatOrdinal
{
    public static function execute(mixed $value, ?string $locale = 'en-US'): string
    {
        return (new \NumberFormatter($locale, \NumberFormatter::ORDINAL))->format((int) $value);
    }
}
