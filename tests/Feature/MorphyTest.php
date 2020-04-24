<?php

namespace Acrossoffwest\MorphyWrapper\Tests\Feature;

use Acrossoffwest\MorphyWrapper\Morphy;
use Acrossoffwest\MorphyWrapper\MorphyRu;
use PHPUnit\Framework\TestCase;

/**
 * Class MorphyRuTest
 * @package Acrossoffwest\MorphyWrapper\Tests\Feature
 */
class MorphyTest extends TestCase
{
    public function testGetByCaseWithExceptionWords()
    {
        $morphy = new Morphy('en');

        $this->assertEquals([
            'FIGHTY',
            'FIGHT'
        ], $morphy->getPseudoRoot('FIGHTY'));
    }
}
