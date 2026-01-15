<?php

declare(strict_types=1);

namespace Endeken\OFX;

class Institute
{
    public function __construct(
        /**
         * @var string The ID of the institute
         */
        public string $id,
        /**
         * @var string This variable stores the institute name.
         */
        public string $name
    )
    {
    }
}
