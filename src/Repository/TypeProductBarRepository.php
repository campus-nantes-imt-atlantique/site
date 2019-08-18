<?php

namespace App\Repository;

use App\Entity\TypeProductBar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeProductBar|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeProductBar|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeProductBar[]    findAll()
 * @method TypeProductBar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeProductBarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeProductBar::class);
    }

    // /**
    //  * @return TypeProductBar[] Returns an array of TypeProductBar objects
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
    public function findOneBySomeField($value): ?TypeProductBar
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
