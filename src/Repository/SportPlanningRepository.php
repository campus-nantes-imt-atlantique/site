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

    public function findByEnglishDay($englishDay,$start,$end)
    {
        $englishDay = ucwords($englishDay);
        return $this->createQueryBuilder('s')
            ->join("s.day","d")
            ->andWhere('d.name_en = :day')
            ->setParameter('day', $englishDay)
            ->andWhere('s.start BETWEEN :start AND :end')
            ->andWhere('s.end BETWEEN :start AND :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->orderBy('s.start', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


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
