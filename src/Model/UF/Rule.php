<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:51
 */

namespace Andre\Model\UF;

use Andre\Model\Entity\Person;

interface Rule
{

    public function rule(Person $person): void;

}