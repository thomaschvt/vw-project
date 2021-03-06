<?php

namespace VintageWest\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TypeBlockRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TypeBlockRepository extends EntityRepository
{
    public function findAllCounted()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(a) FROM VintageWestAdminBundle:TypeBlock a')
            ->getSingleScalarResult();
    }
}
