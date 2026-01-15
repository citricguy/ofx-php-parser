<?php

declare(strict_types=1);

use Endeken\OFX\OFX;
use DateTime;

it('parses a simple date without offset', function (): void {
    $ref = new ReflectionMethod(OFX::class, 'parseDate');
    $ref->setAccessible(true);

    $dt = $ref->invoke(null, '20230101120000');
    /** @var DateTime $dt */

    expect($dt)->toBeInstanceOf(DateTime::class);
    expect($dt->format('Y-m-d H:i:s'))->toBe('2023-01-01 12:00:00');
});

it('parses a date with numeric offset in brackets', function (): void {
    $ref = new ReflectionMethod(OFX::class, 'parseDate');
    $ref->setAccessible(true);

    $dt = $ref->invoke(null, '20230101120000[-8]');
    /** @var DateTime $dt */

    expect($dt)->toBeInstanceOf(DateTime::class);
    // offset in seconds is -8 hours
    expect($dt->getOffset())->toBe(-8 * 3600);
});
