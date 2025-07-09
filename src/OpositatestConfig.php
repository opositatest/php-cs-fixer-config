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
        // We primarily follow PER (extends PSR-12), and Symfony coding standards
        return array_merge(
            [
                '@PER' => true,
                '@Symfony' => true,
            ],
            self::perOverrides(),
            self::symfonyOverrides(),
            self::additionalRules(),
        );
    }

    /** @return array<string, array|bool> */
    private static function additionalRules(): array
    {
        return [
            'assign_null_coalescing_to_coalesce_equal' => true,
            'attribute_empty_parentheses' => [
                'use_parentheses' => false,
            ],
            'general_phpdoc_annotation_remove' => [
                'annotations' => [
                    'author', 'package', 'subpackage',
                ],
            ],
            'header_comment' => [
                'header' => '',
            ],
            'heredoc_to_nowdoc' => true,
            'method_chaining_indentation' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'no_superfluous_elseif' => true,
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
            'phpdoc_line_span' => [
                'const' => 'single',
                'property' => 'single',
                'method' => 'single',
            ],
            'php_unit_attributes' => true,
            'protected_to_private' => true,
            'self_static_accessor' => true,
            'simplified_if_return' => true,
            'ternary_to_null_coalescing' => true,
        ];
    }

    /** @return array<string, array|bool> */
    private static function perOverrides(): array
    {
        return [
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'concat_space' => [
                'spacing' => 'one',
            ],
            'ordered_class_elements' => true,
        ];
    }

    /** @return array<string, array|bool> */
    private static function symfonyOverrides(): array
    {
        return [
            'blank_line_before_statement' => [
                'statements' => [
                    'return',
                    'try',
                ],
            ],
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => true,
                'import_functions' => true,
            ],
            'list_syntax' => ['syntax' => 'short'],
            'method_argument_space' => [
                'on_multiline' => 'ensure_fully_multiline',
            ],
        ];
    }
}
