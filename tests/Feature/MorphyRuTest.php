<?php

namespace Acrossoffwest\MorphyWrapper\Tests\Feature;

use Acrossoffwest\MorphyWrapper\Morphy;
use Acrossoffwest\MorphyWrapper\MorphyRu;
use PHPUnit\Framework\TestCase;

/**
 * Class MorphyRuTest
 * @package Acrossoffwest\MorphyWrapper\Tests\Feature
 */
class MorphyRuTest extends TestCase
{
    public function testGetByCaseWithExceptionWords()
    {
        $morphy = new MorphyRu(new Morphy(), [
            'фитнес' => [
                'ПР' => 'фитнесе'
            ]
        ]);

        $this->assertEquals('фитнесе', $morphy->getByCase('фитнес', ['ПР']));
    }

    public function testGetByCase()
    {
        $morphy = new MorphyRu(new Morphy());

        $this->assertEquals('москве', $morphy->getByCase('москва', ['ПР']));
    }

    public function testGetWordForms()
    {
        $morphy = new MorphyRu(new Morphy());
        $expect = [
            'ИМ' => 'человек',
            'РД' => 'человек',
            'ВН' => 'человека',
            'ДТ' => 'человеку',
            'ПР' => 'человеке',
            'ТВ' => 'человеком',
            'ВН,ЕД' => 'человека'
        ];
        $this->assertEquals($expect, $morphy->getWordForms('человек'));
    }
}
