<?php

namespace VintageWest\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LanguageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LanguageRepository extends EntityRepository
{
    public function findAllCounted()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(a) FROM VintageWestAdminBundle:Language a')
            ->getSingleScalarResult();
    }

    public function getIdLang($lang)
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a.id FROM VintageWestAdminBundle:LAnguage a WHERE a.shorten = :lang')
            ->setParameter('lang',$lang)
            ->getSingleScalarResult();
    }
}
