<?php

declare(strict_types=1);

namespace Tests\Unit;

use BaseCodeOy\Formatter\FormatOrdinal;

it('formats positive integers as ordinals', function (): void {
    expect(FormatOrdinal::execute(1))->toBe('1st');
    expect(FormatOrdinal::execute(2))->toBe('2nd');
    expect(FormatOrdinal::execute(3))->toBe('3rd');
    expect(FormatOrdinal::execute(4))->toBe('4th');
    expect(FormatOrdinal::execute(11))->toBe('11th');
    expect(FormatOrdinal::execute(21))->toBe('21st');
    expect(FormatOrdinal::execute(22))->toBe('22nd');
    expect(FormatOrdinal::execute(23))->toBe('23rd');
    expect(FormatOrdinal::execute(24))->toBe('24th');
    expect(FormatOrdinal::execute(111))->toBe('111th');
});

it('formats negative integers as ordinals', function (): void {
    expect(FormatOrdinal::execute(-1))->toBe('−1st');
    expect(FormatOrdinal::execute(-2))->toBe('−2nd');
    expect(FormatOrdinal::execute(-3))->toBe('−3rd');
    expect(FormatOrdinal::execute(-4))->toBe('−4th');
    expect(FormatOrdinal::execute(-11))->toBe('−11th');
    expect(FormatOrdinal::execute(-21))->toBe('−21st');
    expect(FormatOrdinal::execute(-22))->toBe('−22nd');
    expect(FormatOrdinal::execute(-23))->toBe('−23rd');
    expect(FormatOrdinal::execute(-24))->toBe('−24th');
    expect(FormatOrdinal::execute(-111))->toBe('−111th');
});

it('formats decimal numbers as ordinals', function (): void {
    expect(FormatOrdinal::execute(1.5))->toBe('1st');
    expect(FormatOrdinal::execute(2.4))->toBe('2nd');
    expect(FormatOrdinal::execute(3.6))->toBe('3rd');
});

it('formats with different locales', function (): void {
    expect(FormatOrdinal::execute(1, 'fr-FR'))->toBe('1er');
    expect(FormatOrdinal::execute(2, 'fr-FR'))->toBe('2e');
    expect(FormatOrdinal::execute(3, 'fr-FR'))->toBe('3e');
});
