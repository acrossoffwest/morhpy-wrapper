<?php

namespace Acrossoffwest\MorphyWrapper;

use phpMorphy;

/**
 * Class Morphy
 * @package Acrossoffwest\MorphyWrapper
 */
class Morphy extends phpMorphy
{
    private array $dictionaries = [
        'ru' => 'ru_RU',
        'en' => 'en_EN',
        'ua' => 'uk_UA',
        'de' => 'de_DE'
    ];

    /**
     * Morphy constructor.
     * @param string $language
     * @param string $dictsPath
     * @throws \Exception
     */
    public function __construct(string $language = 'ru', string $dictsPath = './../libs/phpmorphy/dicts')
    {
        $options = [
            'storage' => defined('PHPMORPHY_STORAGE_FILE') ? PHPMORPHY_STORAGE_FILE : 'file'
        ];

        try {
            parent::__construct($this->getDictionaryRealpath($dictsPath), $this->getDictionaryName($language), $options);
        } catch(phpMorphy_Exception $e) {
            throw new Exception('Error occured while creating phpMorphy instance: ' . PHP_EOL . $e);
        }
    }

    /**
     * @param string $language
     * @return string
     * @throws \Exception
     */
    private function getDictionaryName(string $language): string
    {
        if (!isset($this->dictionaries[$language])) {
            throw new \Exception('Language "'.$language.'" not found in dictionary list. You can use only these languages: '.implode(',', $this->dictionaries));
        }
        return $this->dictionaries[$language];
    }

    /**
     * @param string $path
     * @return string
     * @throws \Exception
     */
    private function getDictionaryRealpath(string $path): string
    {
        $path = realpath(preg_match('/^\//', $path) ? $path : __DIR__.'/'.$path);

        if (!is_dir($path)) {
            throw new \Exception('Path "'.$path.'" is not directory');
        }

        return $path;
    }
}
