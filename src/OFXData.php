<?php

declare(strict_types=1);

namespace Endeken\OFX;

class OFXData
{
    /**
     * OFXData constructor.
     *
     * @param AccountInfo[]|null $accountInfo
     * @param BankAccount[] $bankAccounts
     */
    public function __construct(public ?SignOn $signOn, public array|null $accountInfo, public array $bankAccounts)
    {
    }
}
