<?php

declare(strict_types=1);

test('multiple accounts XML can be parsed', function () {
    $parsedData = parseOfxFile('ofx-multiple-accounts-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata file successfully', function () {
    $parsedData = parseOfxFile('ofxdata.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata banking XML 200 format', function () {
    $parsedData = parseOfxFile('ofxdata-banking-xml200.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata BB format', function () {
    $parsedData = parseOfxFile('ofxdata-bb.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata with two STMTRS', function () {
    $parsedData = parseOfxFile('ofxdata-bb-two-stmtrs.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata BPBFC format', function () {
    $parsedData = parseOfxFile('ofxdata-bpbfc.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata CMFR format', function () {
    $parsedData = parseOfxFile('ofxdata-cmfr.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata credit card format', function () {
    $parsedData = parseOfxFile('ofxdata-credit-card.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata with empty datetime', function () {
    $parsedData = parseOfxFile('ofxdata-emptyDateTime.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata full example', function () {
    $parsedData = parseOfxFile('ofxdata-full-example.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata Google format', function () {
    $parsedData = parseOfxFile('ofxdata-google.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata investments multiple accounts XML', function () {
    $parsedData = parseOfxFile('ofxdata-investments-multiple-accounts-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata investments oneline XML', function () {
    $parsedData = parseOfxFile('ofxdata-investments-oneline-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata investments XML', function () {
    $parsedData = parseOfxFile('ofxdata-investments-xml.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata memo with ampersand', function () {
    $parsedData = parseOfxFile('ofxdata-memoWithAmpersand.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata memo with quotes', function () {
    $parsedData = parseOfxFile('ofxdata-memoWithQuotes.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata oneline format', function () {
    $parsedData = parseOfxFile('ofxdata-oneline.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata RBC credit card format', function () {
    $parsedData = parseOfxFile('ofxdata-rbc-credit-card.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata with self-closing tags', function () {
    $parsedData = parseOfxFile('ofxdata-selfclose.ofx');
    expect($parsedData)->not->toBeNull();
});

it('parses ofxdata XML format', function () {
    $parsedData = parseOfxFile('ofxdata-xml.ofx');
    expect($parsedData)->not->toBeNull();
});
