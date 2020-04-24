<?php
use Acrossoffwest\MorphyWrapper\MorphyRu;
use Acrossoffwest\MorphyWrapper\Morphy;

if (!function_exists('array_mapper')) {
    function array_mapper (array $array)
    {
        return \Acrossoffwest\MorphyWrapper\ArrayMapper::create($array);
    }
}

if (!function_exists('dd')) {
    function dd ($output)
    {
        var_dump($output);
        die();
    }
}

if (!function_exists('morphy_get_word_by_case')) {
    function morphy_get_word_by_case (string $word, array $case = ['ИМ'], array $exceptionWords = []): string
    {
        return morphy_get_instance($exceptionWords)->getByCase($word, $case);
    }
}

if (!function_exists('morphy_get_word_forms')) {
    function morphy_get_word_forms (string $word): array
    {
        return morphy_get_instance()->getWordForms($word);
    }
}

if (!function_exists('morphy_get_instance')) {
    function morphy_get_instance (array $exceptionWords = []): MorphyRu
    {
        return new MorphyRu(new Morphy(), $exceptionWords);
    }
}
