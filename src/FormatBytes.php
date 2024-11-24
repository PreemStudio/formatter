<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

final class FormatBytes
{
    public static function execute(int $bytes, int $precision = 2): string
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = \max($bytes, 0);
        $pow = \floor(($bytes ? \log($bytes) : 0) / \log(1_024));
        $pow = \min($pow, \count($units) - 1);

        $bytes /= \pow(1_024, $pow);

        return \round($bytes, $precision).' '.$units[$pow];
    }
}
