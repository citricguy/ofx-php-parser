<?php

declare(strict_types=1);

namespace Endeken\OFX;

use DateTime;

class Transaction
{
    /**
     * @var array<string, string>
     */
    private static array $types = [
        'CREDIT' => 'Generic credit',
        'DEBIT' => 'Generic debit',
        'INT' => 'Interest earned or paid',
        'DIV' => 'Dividend',
        'FEE' => 'FI fee',
        'SRVCHG' => 'Service charge',
        'DEP' => 'Deposit',
        'ATM' => 'ATM debit or credit',
        'POS' => 'Point of sale debit or credit',
        'XFER' => 'Transfer',
        'CHECK' => 'Cheque',
        'PAYMENT' => 'Electronic payment',
        'CASH' => 'Cash withdrawal',
        'DIRECTDEP' => 'Direct deposit',
        'DIRECTDEBIT' => 'Merchant initiated debit',
        'REPEATPMT' => 'Repeating payment/standing order',
        'OTHER' => 'Other',
    ];

    /**
     * Transaction constructor.
     */
    public function __construct(
        public string $type,
        public float $amount,
        public DateTime $date,
        /**
         * Date the user initiated the transaction, if known
         */
        public ?DateTime $userInitiatedDate,
        public string $uniqueId,
        public string $name,
        public string $memo,
        public string $sic,
        public string $checkNumber
    )
    {
    }

    /**
     * Get the associated type description
     */
    public function typeDescription(): string
    {
        $type = $this->type;
        return array_key_exists($type, self::$types) ? self::$types[$type] : '';
    }
}
