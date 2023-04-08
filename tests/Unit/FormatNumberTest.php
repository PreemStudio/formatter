<?php

declare(strict_types=1);

namespace Tests\Unit;

use PreemStudio\Formatter\FormatNumber;

it('formats numbers with appropriate units', function (): void {
    expect(FormatNumber::execute(0))->toBe('0');
    expect(FormatNumber::execute(999))->toBe('999');
    expect(FormatNumber::execute(1000))->toBe('1K');
    expect(FormatNumber::execute(1234))->toBe('1.2K');
    expect(FormatNumber::execute(999999))->toBe('1000K');
    expect(FormatNumber::execute(1000000))->toBe('1M');
    expect(FormatNumber::execute(1234567))->toBe('1.2M');
    expect(FormatNumber::execute(999999999))->toBe('1000M');
    expect(FormatNumber::execute(1000000000))->toBe('1B');
    expect(FormatNumber::execute(1234567890))->toBe('1.2B');
    expect(FormatNumber::execute(999999999999))->toBe('1000B');
    expect(FormatNumber::execute(1000000000000))->toBe('1T');
    expect(FormatNumber::execute(1234567890123))->toBe('1.2T');
    expect(FormatNumber::execute(999999999999999))->toBe('1000T');
});

it('formats negative numbers', function (): void {
    expect(FormatNumber::execute(-10))->toBe('-10');
    expect(FormatNumber::execute(-1000))->toBe('-1000');
    expect(FormatNumber::execute(-1000000))->toBe('-1000000');
});

it('formats decimal numbers', function (): void {
    expect(FormatNumber::execute(0.5))->toBe('0.5');
    expect(FormatNumber::execute(1.5))->toBe('1.5');
    expect(FormatNumber::execute(100.5))->toBe('100.5');
});
