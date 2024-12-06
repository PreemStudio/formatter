<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\Formatter\FormatNumber;

it('formats numbers with appropriate units', function (): void {
    expect(FormatNumber::execute(0))->toBe('0');
    expect(FormatNumber::execute(999))->toBe('999');
    expect(FormatNumber::execute(1_000))->toBe('1K');
    expect(FormatNumber::execute(1_234))->toBe('1.2K');
    expect(FormatNumber::execute(999_999))->toBe('1000K');
    expect(FormatNumber::execute(1_000_000))->toBe('1M');
    expect(FormatNumber::execute(1_234_567))->toBe('1.2M');
    expect(FormatNumber::execute(999_999_999))->toBe('1000M');
    expect(FormatNumber::execute(1_000_000_000))->toBe('1B');
    expect(FormatNumber::execute(1_234_567_890))->toBe('1.2B');
    expect(FormatNumber::execute(999_999_999_999))->toBe('1000B');
    expect(FormatNumber::execute(1_000_000_000_000))->toBe('1T');
    expect(FormatNumber::execute(1_234_567_890_123))->toBe('1.2T');
    expect(FormatNumber::execute(999_999_999_999_999))->toBe('1000T');
});

it('formats negative numbers', function (): void {
    expect(FormatNumber::execute(-10))->toBe('-10');
    expect(FormatNumber::execute(-1_000))->toBe('-1000');
    expect(FormatNumber::execute(-1_000_000))->toBe('-1000000');
});

it('formats decimal numbers', function (): void {
    expect(FormatNumber::execute(0.5))->toBe('0.5');
    expect(FormatNumber::execute(1.5))->toBe('1.5');
    expect(FormatNumber::execute(100.5))->toBe('100.5');
});
