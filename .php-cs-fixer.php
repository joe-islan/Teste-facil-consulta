<?php declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(dirname(dirname(dirname(__DIR__))))
    ->exclude(['src/Proto/', 'vendor/', 'tests/_support/_generated/']);

return (new PhpCsFixer\Config())
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setUsingCache(false)
    ->setRules([
        '@Symfony' => true,
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => ['operators' => ['=>' => null]],
        'combine_consecutive_issets' => true,
        'concat_space' => ['spacing' => 'one'],
        'fully_qualified_strict_types' => false,
        'linebreak_after_opening_tag' => true,
        'mb_str_functions' => true,
        'no_null_property_initialization' => true,
        'no_superfluous_elseif' => true,
        'no_superfluous_phpdoc_tags' => false,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'not_operator_with_space' => false,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_add_missing_param_annotation' => true,
        'phpdoc_order' => true,
        'phpdoc_trim_consecutive_blank_line_separation' => true,
        'return_assignment' => true,
        'simplified_null_return' => true,
        'ternary_to_null_coalescing' => true,
        'yoda_style' => false,
    ]);
