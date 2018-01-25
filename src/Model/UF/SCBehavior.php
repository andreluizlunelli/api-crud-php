<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:48
 */

namespace Andre\Model\UF;

use Andre\Model\Entity\Person;

class SCBehavior implements Rule
{

    public function rule(Person $person): void
    {
        if (empty($person->getRg()))
            throw new \InvalidArgumentException('Necessário informar o RG');

    }

}