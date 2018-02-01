<?php
/**
 * User: André Lunelli <andre@microton.com.br>
 * Date: 26/01/2018
 */

namespace Andre\Model\Repository;

use Andre\Model\Entity\Person;
use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
    public function filter(array $query): array
    {
        $qb = $this->_em->createQueryBuilder();
        $qb ->select('p')
            ->from(Person::class, 'p');

        if ( ! empty($query['name'])) {
            $qb->where('p.name LIKE :name');
            $qb->setParameter('name', '%'.$query['name'].'%');
        }

        if ( ! empty($query['createdAt'])) {
            $qb->where('p.createdAt LIKE :createdAt');
            $qb->setParameter('createdAt', '%'.$query['createdAt'].'%');
        }

        if ( ! empty($query['cpf'])) {
            $qb->where('p.cpf LIKE :cpf');
            $qb->setParameter('cpf', '%'.$query['cpf'].'%');
        }

        if ( ! empty($query['rg'])) {
            $qb->where('p.rg LIKE :rg');
            $qb->setParameter('rg', '%'.$query['rg'].'%');
        }

        if ( ! empty($query['birthday'])) {
            $qb->where('p.birthday LIKE :birthday');
            $qb->setParameter('birthday', '%'.$query['birthday'].'%');
        }

        return $qb->getQuery()->getResult();
    }
}