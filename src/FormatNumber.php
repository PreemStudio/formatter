<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

final class FormatNumber
{
    public static function execute(float|int $value): string
    {
        $units = ['', 'K', 'M', 'B', 'T'];

        for ($i = 0; $value >= 1_000; $i++) {
            $value /= 1_000;
        }

        return \round($value, 1).$units[$i];
    }
}
