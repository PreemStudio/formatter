<?php

declare(strict_types=1);

namespace Tests\Unit;

use BaseCodeOy\Formatter\FormatMoney;

it('formats money values with currency', function (): void {
    expect(FormatMoney::execute(0, 'USD'))->toBe('$0.00');
    expect(FormatMoney::execute(100, 'USD'))->toBe('$1.00');
    expect(FormatMoney::execute(500, 'USD'))->toBe('$5.00');
    expect(FormatMoney::execute(999, 'USD'))->toBe('$9.99');
    expect(FormatMoney::execute(10000, 'USD'))->toBe('$100.00');
    expect(FormatMoney::execute(123456, 'USD'))->toBe('$1,234.56');
});

it('formats negative money values', function (): void {
    expect(FormatMoney::execute(-100, 'USD'))->toBe('-$1.00');
    expect(FormatMoney::execute(-500, 'USD'))->toBe('-$5.00');
});

it('formats money values with different currencies', function (): void {
    expect(FormatMoney::execute(100, 'EUR'))->toBe('€1.00');
    expect(FormatMoney::execute(500, 'GBP'))->toBe('£5.00');
});

it('formats decimal money values', function (): void {
    expect(FormatMoney::execute(0.5, 'USD'))->toBe('$0.50');
    expect(FormatMoney::execute(1.5, 'USD'))->toBe('$1.50');
    expect(FormatMoney::execute(100.5, 'USD'))->toBe('$100.50');
});
