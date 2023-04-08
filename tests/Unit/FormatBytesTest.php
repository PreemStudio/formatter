<?php

declare(strict_types=1);

namespace Tests\Unit;

use PreemStudio\Formatter\FormatBytes;

it('formats bytes with appropriate units', function (): void {
    expect(FormatBytes::execute(0))->toBe('0 B');
    expect(FormatBytes::execute(999))->toBe('999 B');
    expect(FormatBytes::execute(1000))->toBe('1000 B');
    expect(FormatBytes::execute(1234))->toBe('1.21 KB');
    expect(FormatBytes::execute(999999))->toBe('976.56 KB');
    expect(FormatBytes::execute(1000000))->toBe('976.56 KB');
    expect(FormatBytes::execute(1234567))->toBe('1.18 MB');
    expect(FormatBytes::execute(999999999))->toBe('953.67 MB');
    expect(FormatBytes::execute(1000000000))->toBe('953.67 MB');
    expect(FormatBytes::execute(1234567890))->toBe('1.15 GB');
    expect(FormatBytes::execute(999999999999))->toBe('931.32 GB');
    expect(FormatBytes::execute(1000000000000))->toBe('931.32 GB');
    expect(FormatBytes::execute(1234567890123))->toBe('1.12 TB');
    expect(FormatBytes::execute(999999999999999))->toBe('909.49 TB');
});

it('handles negative values', function (): void {
    expect(FormatBytes::execute(-1000))->toBe('0 B');
});

it('handles precision', function (): void {
    expect(FormatBytes::execute(1234, 0))->toBe('1 KB');
    expect(FormatBytes::execute(1234, 1))->toBe('1.2 KB');
    expect(FormatBytes::execute(1234, 3))->toBe('1.205 KB');
});
