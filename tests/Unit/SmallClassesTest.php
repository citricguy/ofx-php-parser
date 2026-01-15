<?php

declare(strict_types=1);

use Endeken\OFX\AccountInfo;
use Endeken\OFX\Status;
use Endeken\OFX\Transaction;
use DateTime;

it('creates an AccountInfo and exposes properties', function (): void {
    $acct = new AccountInfo('Checking Account', '123456');

    expect($acct->description)->toBe('Checking Account');
    expect($acct->number)->toBe('123456');
});

it('returns code description for known and unknown codes', function (): void {
    $statusKnown = new Status('0', 'INFO', 'ok');
    expect($statusKnown->codeDescription())->toBe('Success');

    $statusUnknown = new Status('999', 'INFO', 'unknown');
    expect($statusUnknown->codeDescription())->toBe('');
});

it('returns type description for known and unknown transaction types', function (): void {
    $t = new Transaction('CREDIT', 10.5, new DateTime('2020-01-01'), null, 'id', 'name', 'memo', 'sic', 'check');
    expect($t->typeDescription())->toBe('Generic credit');

    $tUnknown = new Transaction('XXX', 0.0, new DateTime('2020-01-01'), null, 'id', 'name', 'memo', 'sic', 'check');
    expect($tUnknown->typeDescription())->toBe('');
});
