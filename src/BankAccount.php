<?php

declare(strict_types=1);

namespace Endeken\OFX;

use DateTime;

class BankAccount
{
    public function __construct(public string $accountNumber, public string $accountType, public string $agencyNumber, public string $routingNumber, public string $balance, public DateTime $balanceDate, public string $transactionUid, public Statement $statement)
    {
    }
}
