# OFX PHP Parser
This project consists of a PHP parser for OFX (Open Financial Exchange) files, implemented using PHP 8.2. Our aim is to make the process of importing OFX files as straightforward and hassle-free as possible.

[![Build Status](https://scrutinizer-ci.com/g/endeken-com/ofx-php-parser/badges/build.png?b=main)](https://scrutinizer-ci.com/g/endeken-com/ofx-php-parser/build-status/main)
[![Latest Stable Version](https://img.shields.io/github/v/release/endeken-com/ofx-php-parser.svg)](https://packagist.org/packages/endeken/ofx-php-parser)
[![Code Coverage](https://scrutinizer-ci.com/g/endeken-com/ofx-php-parser/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/endeken/ofx-php-parser/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/endeken-com/ofx-php-parser/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/endeken/ofx-php-parser/?branch=master)
[![Downloads](https://img.shields.io/packagist/dt/endeken/ofx-php-parser.svg)](https://packagist.org/packages/endeken/ofx-php-parser)
[![Downloads](https://img.shields.io/badge/license-MIT-brightgreen.svg)](./LICENSE)


## Installation
Simply require the package using [Composer](https://getcomposer.org/):

```bash
$ composer require endeken/ofx-php-parser
```

## Usage
This project primarily revolves around the `OFX` class in the `Endeken\OFX` namespace. This class provides a static function `parse()` which is used to parse OFX data and return the parsed information. Here is a basic usage example:
```php
<?php

require 'vendor/autoload.php';

use Endeken\OFX\OFX;

try {
    // Load the OFX data
    $ofxData = file_get_contents('path_to_your_ofx_file.ofx');

    // Parse the OFX data
    $parsedData = OFX::parse($ofxData);

    // $parsedData is an instance of OFXData which gives you access to all parsed data

    // Access the sign-on status code
    $statusCode = $parsedData->signOn->status->code;

    // Accessing bank accounts data
    $bankAccounts = $parsedData->bankAccounts;
    foreach($bankAccounts as $account) {
        echo 'Account ID: ' .$account->accountNumber . PHP_EOL;
        echo 'Bank ID: ' .$account->routingNumber . PHP_EOL;

        // Loop through each transaction
        foreach ($account->statement->transactions as $transaction) {
            echo 'Transaction Type: ' . $transaction->type . PHP_EOL;
            echo 'Date: ' . $transaction->date . PHP_EOL;
            echo 'Amount: ' . $transaction->amount . PHP_EOL;
        }
    }

} catch (Exception $e) {
    echo 'An error occurred: ' . $e->getMessage();
}
```

## Release v2.0.0
This repository has been modernized and is being released as **v2.0.0**. Highlights in this major release:

- Tests migrated to **Pest v4** and modernized to use `test()`/`it()` style. ✅
- Added **PHPStan** static analysis (configured at level 10) and fixed reported issues. ✅
- Applied automated, safe refactorings with **Rector** to modernize code (constructor promotion, strict types, type hints). ✅
- Added test coverage tooling and composer scripts to generate HTML, text, and Clover reports. ✅
- Improved overall test coverage and fixed parsing edge cases uncovered by stricter types.

This is a breaking change release due to modernization and stricter typing; users should test their consuming code and consult the migration notes.

## Development & Testing
Quick commands to run locally:

- Run tests: `composer test` (Pest)
- Static analysis: `composer analyse` (PHPStan)
- Coverage (HTML, no Xdebug required): `composer coverage` or `composer coverage:html`
- Coverage (text, uses Xdebug): `composer run coverage:text` or `php -d xdebug.mode=coverage ./vendor/bin/pest --coverage --coverage-text --coverage-filter=./src`
- Generate Clover XML (CI): `composer run coverage:clover`

If you'd like to run coverage without changing Xdebug settings, use the `composer coverage` script (it uses phpdbg).

---

## Acknowledgements

This library stands on the shoulders of giants — full credit and appreciation go to the projects and maintainers that paved the way:

- **asgrim/ofxparser** — provided an invaluable reference implementation and inspired much of the parsing behaviour we relied on. (https://github.com/asgrim/ofxparser)
- **grimfor/ofxparser** — the earlier work and ideas that influenced subsequent forks and improvements. (https://github.com/grimfor/ofxparser)
- The many contributors, maintainers, and users of these projects for rigorous examples, bug reports, and design decisions that guided our modernization.

We did not merely fork these projects; we built on their foundations, modernized the codebase (tests, static analysis, and refactorings), and worked to make the library safer and easier to use for everyone. If you contributed to any of the above projects — thank you, your work made this possible.
