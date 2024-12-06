<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit;

use BaseCodeOy\Formatter\FormatPercentage;

it('formats the input value as a percentage', function (): void {
    expect(FormatPercentage::execute(0))->toBe('0.00%');
    expect(FormatPercentage::execute(50))->toBe('50.00%');
    expect(FormatPercentage::execute(100))->toBe('100.00%');
    expect(FormatPercentage::execute(5.678_9))->toBe('5.68%');
    expect(FormatPercentage::execute(-5.678_9))->toBe('-5.68%');
});
