<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:09
 */

namespace Tests\Model;

use Andre\Model\UF\PRBehavior;
use PHPUnit\Framework\TestCase;
use Doctrine\ORM\EntityManager;
use Andre\Model\Entity\Person;
use Andre\Model\Entity\Phone;
use Andre\Model\PersonService;
use Andre\Model\UF\SCBehavior;
use Andre\System\Database;

class PersonServiceTest extends TestCase
{
    /**
     * @var EntityManager
     */
    private $em;

    protected function setUp()
    {
        parent::setUp();

        $this->em = Database::getEm();

        $q = $this->em->createQuery("delete ".Phone::class." a");
        $q->execute();

        $q = $this->em->createQuery("delete ".Person::class." a");
        $q->execute();

        $this->em->clear();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testCadastrarPessoaSCLancarExcecaoSemRg()
    {
        $person = new Person();
        $person->setName('a');
        $person->setBirthday(new \DateTime('now'));
        $person->setCpf('000000000');
        $person->addPhone(new Phone('afsdaf6545'));

        $ps = new PersonService(new SCBehavior(), $this->em);
        $ps->put($person);
    }

    public function testCadastrarPessoaSC()
    {
        $person = new Person();
        $person->setName('a');
        $person->setBirthday(new \DateTime('now'));
        $person->setCpf('000000000');
        $person->setRg('asdfasdfadf');
        $person->addPhone(new Phone('afsdaf6545'));

        $ps = new PersonService(new SCBehavior(), $this->em);
        $ps->put($person);

        self::assertCount(1, $this->em->getRepository(Person::class)->findAll());
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Usuário não pode ser menor de idade
     */
    public function testCadastrarPessoaPRLancarExcecaoMenordeIdade()
    {
        $person = new Person();
        $person->setName('name');
        $person->setBirthday(new \DateTime('now'));

        $ps = new PersonService(new PRBehavior(), $this->em);
        $ps->put($person);
    }

    public function testCadastrarPessoaPR()
    {
        $person = new Person();
        $person->setName('name');
        $person->setBirthday(new \DateTime('2000-01-01'));

        $ps = new PersonService(new PRBehavior(), $this->em);
        $ps->put($person);

        self::assertCount(1, $this->em->getRepository(Person::class)->findAll());
    }


}