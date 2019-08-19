<?php

namespace App\Repository;

use App\Entity\BarProductType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BarProductType|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarProductType|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarProductType[]    findAll()
 * @method BarProductType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarProductTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BarProductType::class);
    }

    // /**
    //  * @return BarProductType[] Returns an array of BarProductType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BarProductType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
