<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:09
 */

namespace Andre\Model;

use Doctrine\ORM\EntityManager;
use Andre\Model\Entity\Person;
use Andre\Model\UF\Rule;

class PersonService
{
    /**
     * @var Rule
     */
    private $ufRule;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * PersonService constructor.
     * @param Rule $ufRule
     * @param EntityManager $em
     */
    public function __construct(Rule $ufRule, EntityManager $em)
    {
        $this->ufRule = $ufRule;
        $this->em = $em;
    }

    public function put(Person $person)
    {
        $this->ufRule->rule($person);

        $this->em->persist($person);

        $this->em->flush();
    }

    /**
     * @return Rule
     */
    public function getUfRule(): Rule
    {
        return $this->ufRule;
    }

    /**
     * @param Rule $ufRule
     */
    public function setUfRule(Rule $ufRule)
    {
        $this->ufRule = $ufRule;
    }

    /**
     * @return EntityManager
     */
    public function getEm(): EntityManager
    {
        return $this->em;
    }

    /**
     * @param EntityManager $em
     */
    public function setEm(EntityManager $em)
    {
        $this->em = $em;
    }

}