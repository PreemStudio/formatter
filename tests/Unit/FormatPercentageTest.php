<?php

declare(strict_types=1);

namespace Tests\Unit;

use BombenProdukt\Formatter\FormatPercentage;

it('formats the input value as a percentage', function (): void {
    expect(FormatPercentage::execute(0))->toBe('0.00%');
    expect(FormatPercentage::execute(50))->toBe('50.00%');
    expect(FormatPercentage::execute(100))->toBe('100.00%');
    expect(FormatPercentage::execute(5.6789))->toBe('5.68%');
    expect(FormatPercentage::execute(-5.6789))->toBe('-5.68%');
});
