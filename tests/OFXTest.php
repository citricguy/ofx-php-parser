<?php

declare(strict_types=1);

test('multiple accounts XML can be parsed', function (): void {
    $parsedData = parseOfxFile('ofx-multiple-accounts-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata file successfully', function (): void {
    $parsedData = parseOfxFile('ofxdata.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata banking XML 200 format', function (): void {
    $parsedData = parseOfxFile('ofxdata-banking-xml200.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata BB format', function (): void {
    $parsedData = parseOfxFile('ofxdata-bb.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata with two STMTRS', function (): void {
    $parsedData = parseOfxFile('ofxdata-bb-two-stmtrs.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata BPBFC format', function (): void {
    $parsedData = parseOfxFile('ofxdata-bpbfc.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata CMFR format', function (): void {
    $parsedData = parseOfxFile('ofxdata-cmfr.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata credit card format', function (): void {
    $parsedData = parseOfxFile('ofxdata-credit-card.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata with empty datetime', function (): void {
    $parsedData = parseOfxFile('ofxdata-emptyDateTime.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata full example', function (): void {
    $parsedData = parseOfxFile('ofxdata-full-example.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata Google format', function (): void {
    $parsedData = parseOfxFile('ofxdata-google.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata investments multiple accounts XML', function (): void {
    $parsedData = parseOfxFile('ofxdata-investments-multiple-accounts-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata investments oneline XML', function (): void {
    $parsedData = parseOfxFile('ofxdata-investments-oneline-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata investments XML', function (): void {
    $parsedData = parseOfxFile('ofxdata-investments-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata memo with ampersand', function (): void {
    $parsedData = parseOfxFile('ofxdata-memoWithAmpersand.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata memo with quotes', function (): void {
    $parsedData = parseOfxFile('ofxdata-memoWithQuotes.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata oneline format', function (): void {
    $parsedData = parseOfxFile('ofxdata-oneline.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata RBC credit card format', function (): void {
    $parsedData = parseOfxFile('ofxdata-rbc-credit-card.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata with self-closing tags', function (): void {
    $parsedData = parseOfxFile('ofxdata-selfclose.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata XML format', function (): void {
    $parsedData = parseOfxFile('ofxdata-xml.ofx');
    expect($parsedData)->not->toBeNull();
});
