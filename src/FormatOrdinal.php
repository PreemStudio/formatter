<?php

declare(strict_types=1);

namespace BombenProdukt\Formatter;

use NumberFormatter;

final class FormatOrdinal
{
    public static function execute(mixed $value, ?string $locale = 'en-US'): string
    {
        return (new NumberFormatter($locale, NumberFormatter::ORDINAL))->format((int) $value);
    }
}
