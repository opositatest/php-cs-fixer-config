<?php

declare(strict_types=1);

namespace Opositatest\PhpCsFixerConfig;

use PhpCsFixer\Config;

class SafeConfig extends Config
{
    public function __construct()
    {
        parent::__construct('Opositatest');
        $this->setRiskyAllowed(false);
    }

    public function getRules(): array
    {
        return [
            '@PHP56Migration' => true,
            '@PHP70Migration' => true,
            '@PHP71Migration' => true,
            '@Symfony' => true,

            'align_multiline_comment' => true,
            'array_syntax' => ['syntax' => 'short'],
            'blank_line_before_statement' => true,
            'combine_consecutive_issets' => true,
            'combine_consecutive_unsets' => true,
            'compact_nullable_typehint' => true,
            'general_phpdoc_annotation_remove' => ['author'],
            'header_comment' => ['header' => ''],
            'heredoc_to_nowdoc' => true,
            'list_syntax' => ['syntax' => 'long'],
            'method_argument_space' => ['ensure_fully_multiline' => true],
            'no_extra_consecutive_blank_lines' => ['tokens' => ['break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block']],
            'no_null_property_initialization' => true,
            'no_short_echo_tag' => true,
            'no_superfluous_elseif' => true,
            'no_unneeded_curly_braces' => true,
            'no_unneeded_final_method' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => true,
            'ordered_imports' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_order' => true,
            'phpdoc_types_order' => true,
            'semicolon_after_instruction' => true,
            'single_line_comment_style' => true,
            'yoda_style' => true,
            'method_chaining_indentation' => true,
            'phpdoc_line_span' => ['const' => 'single', 'property' => 'single'],
        ];
    }
}
