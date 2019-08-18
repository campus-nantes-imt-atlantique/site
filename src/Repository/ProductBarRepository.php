<?php

namespace App\Repository;

use App\Entity\ProductBar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductBar|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductBar|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductBar[]    findAll()
 * @method ProductBar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductBarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductBar::class);
    }

    // /**
    //  * @return ProductBar[] Returns an array of ProductBar objects
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

    /*
    public function findOneBySomeField($value): ?ProductBar
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
