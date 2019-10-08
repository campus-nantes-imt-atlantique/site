<?php

namespace App\Repository;

use App\Entity\SportLeader;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SportLeader|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportLeader|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportLeader[]    findAll()
 * @method SportLeader[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportLeaderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SportLeader::class);
    }

    // /**
    //  * @return SportLeader[] Returns an array of SportLeader objects
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
    public function findOneBySomeField($value): ?SportLeader
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
