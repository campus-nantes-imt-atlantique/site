<?php

namespace App\Repository;

use App\Entity\BarProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BarProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method BarProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method BarProduct[]    findAll()
 * @method BarProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BarProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BarProduct::class);
    }

    // /**
    //  * @return BarProduct[] Returns an array of BarProduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

     /**
      * @return BarProduct[] Returns an array of BarProduct objects
      */
    
    public function findAvailableProducts()
    {
        return $this->createQueryBuilder('p')
            ->join('p.type','t')
            ->andWhere('p.available = True')
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
    
    /*
    public function findOneBySomeField($value): ?BarProduct
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
