<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig;

use PhpCsFixer\Config;

final class OpositatestConfig extends Config
{
    public function __construct()
    {
        parent::__construct('Opositatest');
        $this->setRiskyAllowed(false);
    }

    public function getRules(): array
    {
        return [
            // Symfony rule set
            '@Symfony' => true,

            // additional configurations
            'attribute_empty_parentheses' => [
                'use_parentheses' => false,
            ],
            'ordered_attributes' => [
                'sort_algorithm' => 'custom',
                'order' => [
                    'Symfony\\Component\\Routing\\Annotation\\Route',
                    'OpenApi\\Attributes\\Tag',
                    'OpenApi\\Attributes\\Parameter',
                    'OpenApi\\Attributes\\RequestBody',
                    'OpenApi\\Attributes\\Response',
                    'Symfony\\Component\\HttpKernel\\Attribute\\Cache',
                ],
            ],
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    'author', 'package', 'subpackage',
                ],
            ],
            'header_comment' => ['header' => ''],
            'heredoc_to_nowdoc' => true,
            'no_superfluous_elseif' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => true,
            'method_chaining_indentation' => true,
            'phpdoc_line_span' => [
                'const' => 'single',
                'property' => 'single',
            ],
            'protected_to_private' => true,
            'self_static_accessor' => true,
            'simplified_if_return' => true,
            'assign_null_coalescing_to_coalesce_equal' => true,
            'ternary_to_null_coalescing' => true,
            'php_unit_attributes' => true,
            'concat_space' => ['spacing' => 'one'],
            'global_namespace_import' => ['import_classes' => true, 'import_constants' => true, 'import_functions' => true],

            // Symfony's ruleset overrides
            'blank_line_before_statement' => [
                'statements' => [
                    'return',
                    'try',
                ],
            ],
            'method_argument_space' => [
                'on_multiline' => 'ensure_fully_multiline',
            ],
        ];
    }
}
