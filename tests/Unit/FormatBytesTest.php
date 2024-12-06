<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\Formatter\FormatBytes;

it('formats bytes with appropriate units', function (): void {
    expect(FormatBytes::execute(0))->toBe('0 B');
    expect(FormatBytes::execute(999))->toBe('999 B');
    expect(FormatBytes::execute(1_000))->toBe('1000 B');
    expect(FormatBytes::execute(1_234))->toBe('1.21 KB');
    expect(FormatBytes::execute(999_999))->toBe('976.56 KB');
    expect(FormatBytes::execute(1_000_000))->toBe('976.56 KB');
    expect(FormatBytes::execute(1_234_567))->toBe('1.18 MB');
    expect(FormatBytes::execute(999_999_999))->toBe('953.67 MB');
    expect(FormatBytes::execute(1_000_000_000))->toBe('953.67 MB');
    expect(FormatBytes::execute(1_234_567_890))->toBe('1.15 GB');
    expect(FormatBytes::execute(999_999_999_999))->toBe('931.32 GB');
    expect(FormatBytes::execute(1_000_000_000_000))->toBe('931.32 GB');
    expect(FormatBytes::execute(1_234_567_890_123))->toBe('1.12 TB');
    expect(FormatBytes::execute(999_999_999_999_999))->toBe('909.49 TB');
});

it('handles negative values', function (): void {
    expect(FormatBytes::execute(-1_000))->toBe('0 B');
});

it('handles precision', function (): void {
    expect(FormatBytes::execute(1_234, 0))->toBe('1 KB');
    expect(FormatBytes::execute(1_234, 1))->toBe('1.2 KB');
    expect(FormatBytes::execute(1_234, 3))->toBe('1.205 KB');
});
