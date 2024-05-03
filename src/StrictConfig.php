<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig;

class StrictConfig extends SafeConfig
{
    public function __construct()
    {
        parent::__construct();
        $this->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        return \array_merge(
            parent::getRules(),
            [
                '@Symfony:risky' => true,
                'date_time_immutable' => true,
                'mb_str_functions' => true,
                'strict_comparison' => true,
                'strict_param' => true,
                'php_unit_strict' => true,
            ]
        );
    }
}
