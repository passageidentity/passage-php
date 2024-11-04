<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->exclude([
        'generated',
    ])
;

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer:risky' => true,
    ])
    ->setFinder($finder)
;