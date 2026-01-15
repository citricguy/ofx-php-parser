<?php

declare(strict_types=1);

use Endeken\OFX\OFX;
use Endeken\OFX\OFXData;

pest()->in('.');

function parseOfxFile(string $filename): ?OFXData
{
    $filePath = __DIR__ . '/fixtures/' . $filename;
    $ofxContent = file_get_contents($filePath);
    
    if ($ofxContent === false) {
        throw new RuntimeException("Failed to read file: $filePath");
    }
    
    return OFX::parse($ofxContent);
}
