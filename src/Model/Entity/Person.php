<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 21:29
 */

namespace Andre\Model\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="person")
 *
 * Class Person
 * @package Model\Entity
 */
class Person
{
    use EntityTrait;

    /**
     * @var string
     *
     * @ORM\Column()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column()
     */
    private $cpf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(nullable=true)
     */
    private $rg;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Phone", mappedBy="person", cascade={"all"})
     */
    private $phones;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
    }

    public function addPhone(Phone $phone): void
    {
        $phone->setPerson($this);
        $this->phones->add($phone);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param \DateTime $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return ArrayCollection
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @param ArrayCollection $phones
     */
    public function setPhones($phones)
    {
        $this->phones = $phones;
    }

    /**
     * @return string
     */
    public function getRg(): ?string
    {
        return $this->rg;
    }

    /**
     * @param string $rg
     */
    public function setRg(string $rg)
    {
        $this->rg = $rg;
    }

}