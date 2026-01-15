<?php

declare(strict_types=1);

namespace Endeken\OFX;

use DateTime;

class Statement
{
    /**
     * @param array<int, Transaction> $transactions
     */
    public function __construct(public string $currency, public array $transactions, public DateTime $startDate, public DateTime $endDate)
    {
    }
}
