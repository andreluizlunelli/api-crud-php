<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:46
 */

namespace Tests\Model;

use Andre\Model\UF\UFFactory;
use PHPUnit\Framework\TestCase;

class UFFactoryTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     */
    public function testLancarExcesaoUfNaoReconhecido()
    {
        UFFactory::createUFBehavior('la');
    }

}