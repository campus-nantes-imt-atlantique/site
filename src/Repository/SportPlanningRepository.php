<?php

namespace App\Repository;

use App\Entity\SportPlanning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SportPlanning|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportPlanning|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportPlanning[]    findAll()
 * @method SportPlanning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportPlanningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SportPlanning::class);
    }

    // /**
    //  * @return SportPlanning[] Returns an array of SportPlanning objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SportPlanning
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
