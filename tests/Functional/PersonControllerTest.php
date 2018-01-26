<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 25/01/2018
 * Time: 22:05
 */

namespace Tests\Functional;

class PersonControllerTest extends BaseTestCase
{
    public function testCadastrarPessoa()
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

        $response = $this->runApp('post', '/api/person', $data);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('SlimFramework', (string)$response->getBody());
        $this->assertNotContains('Hello', (string)$response->getBody());
    }
}