<?php

namespace BauobjektBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AnfrageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnfrageRepository extends EntityRepository
{

    public function findByUser($user)
    {
        return $this->getEntityManager()->createQuery(
            'SELECT s FROM BauobjektBundle:Anfrage s WHERE s.fkUser =:user')
            ->setParameter('user', $user)
            ->getResult();
    }

}
