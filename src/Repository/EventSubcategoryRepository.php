<?php

namespace App\Repository;

use App\Entity\EventSubcategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EventSubcategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventSubcategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventSubcategory[]    findAll()
 * @method EventSubcategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventSubcategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventSubcategory::class);
    }

    // /**
    //  * @return EventSubcategory[] Returns an array of EventSubcategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EventSubcategory
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
