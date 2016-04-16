<?php

namespace Mediapark\AdvertisementBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdvertisementRepository extends \Doctrine\ORM\EntityRepository
{
    public function findUserAdvertisements($user)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a FROM MediaparkAdvertisementBundle:Advertisement a
                 WHERE a.user = :user
                 ORDER BY a.postingDate DESC'
            )->setParameter('user', $user)
            ->getResult();
    }

    public function findAllDesc()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a FROM MediaparkAdvertisementBundle:Advertisement a
                 ORDER BY a.postingDate DESC'
            )
            ->getResult();
    }
}
