<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 24/01/2018
 * Time: 22:49
 */

namespace Andre\Model\UF;

use Andre\Model\Entity\Person;

class PRBehavior implements Rule
{

    public function rule(Person $person): void
    {
        if (empty($person->getBirthday()))
            throw new \RuntimeException('Necessário informar a data de nascimento');

        $dateInterval = $person->getBirthday()->diff(new \DateTime('now'));

        if ($dateInterval->y < 18)
            throw new \RuntimeException('Usuário não pode ser menor de idade');

    }

}