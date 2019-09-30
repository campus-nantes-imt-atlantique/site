<?php

namespace App\Repository;

use App\Entity\SportLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SportLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportLocation[]    findAll()
 * @method SportLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportLocationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SportLocation::class);
    }

    // /**
    //  * @return SportLocation[] Returns an array of SportLocation objects
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
    public function findOneBySomeField($value): ?SportLocation
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
