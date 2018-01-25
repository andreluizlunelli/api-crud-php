<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 21:43
 */

namespace Andre\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="phone")
 *
 * Class Person
 * @package Model\Entity
 */
class Phone
{
    use EntityTrait;

    /**
     * @var string
     *
     * @ORM\Column()
     */
    private $number;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="phones", cascade={"all"})
     */
    private $person;

    public function __construct(string $number)
    {
        $this->createdAt = new \DateTime('now');
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person)
    {
        $this->person = $person;
    }

}