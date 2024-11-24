<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

final class ScaleValue
{
    public static function execute(...$args): \Closure
    {
        $presets = [
            'coverage' => [
                [50, 75, 90, 95],
                ['red.600', 'orange.600', 'EEAA22', '99CC11', 'green.600'],
            ],
        ];

        if (\count($args) === 1 && \is_string($args[0])) {
            $preset = $presets[$args[0]];

            return self::execute(...$preset);
        }

        [$steps, $results] = $args;

        if (\count($steps) !== \count($results) - 1) {
            throw new \RuntimeException('<results> length should be n + 1 for n <steps>.');
        }

        return function ($value) use ($steps, $results) {
            return $results[\array_search(true, \array_map(fn ($step) => $step > $value, $steps), true)];
        };
    }
}
