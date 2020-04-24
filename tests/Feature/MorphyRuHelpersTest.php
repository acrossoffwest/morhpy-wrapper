<?php

namespace Acrossoffwest\MorphyWrapper\Tests\Feature;

use Acrossoffwest\MorphyWrapper\Morphy;
use Acrossoffwest\MorphyWrapper\MorphyRu;
use PHPUnit\Framework\TestCase;

/**
 * Class MorphyRuTest
 * @package Acrossoffwest\MorphyWrapper\Tests\Feature
 */
class MorphyRuHelpersTest extends TestCase
{
    public function testGetByCaseWithExceptionWords()
    {
        $this->assertEquals('фитнесе', morphy_get_word_by_case('фитнес', ['ПР'], [
            'фитнес' => [
                'ПР' => 'фитнесе'
            ]
        ]));
    }

    public function testGetByCase()
    {
        $this->assertEquals('москве', morphy_get_word_by_case('москва', ['ПР']));
    }

    public function testGetWordForms()
    {
        $expect = [
            'ИМ' => 'человек',
            'РД' => 'человек',
            'ВН' => 'человека',
            'ДТ' => 'человеку',
            'ПР' => 'человеке',
            'ТВ' => 'человеком',
            'ВН,ЕД' => 'человека'
        ];
        $this->assertEquals($expect, morphy_get_word_forms('человек'));
    }
}
