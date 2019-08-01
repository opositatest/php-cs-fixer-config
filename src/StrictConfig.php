<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig;

use function array_merge;

class StrictConfig extends SafeConfig
{
    public function __construct()
    {
        parent::__construct();
        $this->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        return array_merge(
            parent::getRules(),
            [
                '@PHP56Migration:risky' => true,
                '@PHP70Migration:risky' => true,
                '@PHP71Migration:risky' => true,
                '@PHPUnit60Migration:risky' => true,
                '@Symfony:risky' => true,
                'date_time_immutable' => true,
                'logical_operators' => true,
                'mb_str_functions' => true,
                'no_unreachable_default_argument_value' => true,
                'strict_comparison' => true,
                'strict_param' => true,
                'php_unit_strict' => true,
            ]
        );
    }
}
