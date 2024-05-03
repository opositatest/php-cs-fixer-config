<?php
$config = new Opositatest\PhpCsFixerConfig\SafeConfig();
$config->getFinder()
    ->in(__DIR__ . "/src")
    ->in(__DIR__ . "/tests");
return $config;