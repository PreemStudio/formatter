<?php

declare(strict_types=1);

namespace Tests\Unit;

use PreemStudio\Formatter\FormatMetric;

it('formats small numbers with one decimal digit', function (): void {
    expect(FormatMetric::execute(0))->toBe('0');
    expect(FormatMetric::execute(10))->toBe('10');
    expect(FormatMetric::execute(999))->toBe('999');
    expect(FormatMetric::execute(1000))->toBe('1k');
    expect(FormatMetric::execute(1023))->toBe('1k');
    expect(FormatMetric::execute(1500))->toBe('1.5k');
    expect(FormatMetric::execute(1555))->toBe('1.6k');
    expect(FormatMetric::execute(2000))->toBe('2k');
    expect(FormatMetric::execute(999999))->toBe('1M');
    expect(FormatMetric::execute(9999999))->toBe('10M');
    expect(FormatMetric::execute(99999999))->toBe('100M');
    expect(FormatMetric::execute(999999999))->toBe('1G');
});

it('formats large numbers with appropriate unit', function (): void {
    expect(FormatMetric::execute(0))->toBe('0');
    expect(FormatMetric::execute(100))->toBe('100');
    expect(FormatMetric::execute(9999))->toBe('10k');
    expect(FormatMetric::execute(10000))->toBe('10k');
    expect(FormatMetric::execute(9999999))->toBe('10M');
    expect(FormatMetric::execute(10000000))->toBe('10M');
    expect(FormatMetric::execute(9999999999))->toBe('10G');
    expect(FormatMetric::execute(10000000000))->toBe('10G');
});

it('formats negative numbers', function (): void {
    expect(FormatMetric::execute(-10))->toBe('-10');
    expect(FormatMetric::execute(-1000))->toBe('-1k');
    expect(FormatMetric::execute(-1000000))->toBe('-1M');
});

it('formats decimal numbers', function (): void {
    expect(FormatMetric::execute(0.5))->toBe('0.5');
    expect(FormatMetric::execute(1.5))->toBe('1.5');
    expect(FormatMetric::execute(100.5))->toBe('100.5');
});
