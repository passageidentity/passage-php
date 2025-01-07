<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude([
        'src/generated',
    ])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer:risky' => true,
    ])
    ->setFinder($finder)
;