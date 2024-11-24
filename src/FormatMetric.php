<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

final class FormatMetric
{
    public static function execute(mixed $n): string
    {
        $metricPrefix = ['k', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y'];
        $metricPower = \array_map(function ($a, $i) {
            return \pow(1_000, $i + 1);
        }, $metricPrefix, \array_keys($metricPrefix));

        for ($i = \count($metricPrefix) - 1; $i >= 0; $i--) {
            $limit = $metricPower[$i];
            $absN = \abs($n);

            if ($absN >= $limit) {
                $scaledN = $absN / $limit;

                if ($scaledN < 10) {
                    // For "small" numbers, display one decimal digit unless it is 0.
                    $oneDecimalN = \number_format($scaledN, 1);

                    if (\mb_substr($oneDecimalN, -1) !== '0') {
                        $res = "{$oneDecimalN}{$metricPrefix[$i]}";

                        return $n > 0 ? $res : "-{$res}";
                    }
                }

                $roundedN = \round($scaledN);

                if ($roundedN < 1_000) {
                    $res = "{$roundedN}{$metricPrefix[$i]}";

                    return $n > 0 ? $res : "-{$res}";
                } else {
                    $res = "1{$metricPrefix[$i + 1]}";

                    return $n > 0 ? $res : "-{$res}";
                }
            }
        }

        return "{$n}";
    }
}
