<?php

declare(strict_types=1);

namespace Endeken\OFX;

class AccountInfo
{
    public function __construct(
        /**
         * @var string $description The account description
         */
        public string $description,
        /**
         * @var string $number The account number.
         */
        public string $number
    )
    {
    }
}
