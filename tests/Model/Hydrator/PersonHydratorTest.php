<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 25/01/2018
 * Time: 23:31
 */

namespace Tests\Model\Hydrator;

use Andre\Model\Hydrator\PersonHydrator;
use PHPUnit\Framework\TestCase;

class PersonHydratorTest extends TestCase
{
    public function testParseDataPerson()
    {
        $data = [
            'name' => 'name'
            ,'birthday' => '24/09/1991'
            ,'cpf' => 'cpf'
            ,'rg' => 'rg'
            ,'phone' => [
                '33334444'
                ,'999886665'
            ]
        ];

        $person = PersonHydrator::parseFromJson($data);

        self::assertEquals('name', $person->getName());
        self::assertEquals('cpf', $person->getCpf());
        self::assertEquals('rg', $person->getRg());
        self::assertNotEmpty($person->getBirthday());
    }

}