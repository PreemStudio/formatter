<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Formatter;

final class FormatStars
{
    public static function execute(mixed $rating, int $max = 5): string
    {
        $flooredRating = \floor((float) $rating);
        $stars = '';

        while (\mb_strlen($stars) < $flooredRating) {
            $stars .= '★';
        }

        if (\mb_strlen($stars) >= $max) {
            return $stars;
        }

        $decimal = $rating - $flooredRating;

        if ($decimal >= 0.875) {
            $stars .= '★';
        } elseif ($decimal >= 0.625) {
            $stars .= '¾';
        } elseif ($decimal >= 0.375) {
            $stars .= '½';
        } elseif ($decimal >= 0.125) {
            $stars .= '¼';
        }

        while (\mb_strlen($stars) < $max) {
            $stars .= '☆';
        }

        return $stars;
    }
}
