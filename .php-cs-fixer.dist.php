<?php
declare(strict_types=1);

$config = new \Opositatest\PhpCsFixerConfig\SafeConfig();
$config->setCacheFile('.php-cs-fixer.cache');

$config->getFinder()
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");

return $config;
