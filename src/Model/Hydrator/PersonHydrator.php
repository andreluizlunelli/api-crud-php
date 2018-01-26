<?php
/**
 * Created by PhpStorm.
 * User: André Luiz
 * Date: 25/01/2018
 * Time: 23:24
 */

namespace Andre\Model\Hydrator;

use Andre\Model\Entity\Person;
use Andre\Model\Entity\Phone;
use Andre\System\Date;

class PersonHydrator
{

    static public function parseFromJson(array $data): Person
    {
        $person = new Person();
        $person->setName($data['name'] ?? null);
        $person->setBirthday(\DateTime::createFromFormat(Date::FORMAT, $data['birthday']) ?? null);
        $person->setCpf($data['cpf'] ?? null);
        $person->setRg($data['rg'] ?? null);

        $phone = $data['phone'] ?? null;

        if ( ! empty($phone))
            foreach ($phone as $p)
                $person->addPhone(new Phone($p));

        return $person;
    }

}