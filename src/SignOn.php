<?php

declare(strict_types=1);

namespace Endeken\OFX;

use DateTime;

class SignOn
{
    public function __construct(public Status $status, public DateTime $date, public string $language, public Institute $institute)
    {
    }
}
