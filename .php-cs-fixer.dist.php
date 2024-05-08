<?php
declare(strict_types=1);

use Opositatest\PhpCsFixerConfig\OpositatestConfig;

$config = new OpositatestConfig();
$config->setCacheFile('.php-cs-fixer.cache');

$config->getFinder()
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");

return $config;
