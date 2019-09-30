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
            ->join("s.sport","sport")
            ->andWhere('lower(d.name_en) = lower(:day)')
            ->setParameter('day', $englishDay)
            ->andWhere('s.start BETWEEN :start AND :end')
            ->andWhere('s.end BETWEEN :start AND :end')
            ->orderBy('s.start', 'asc')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByPeriod($start,$end)
    {
        return $this->createQueryBuilder('s')
            ->join("s.sport","sport")
            ->andWhere('s.start BETWEEN :start AND :end')
            ->andWhere('s.end BETWEEN :start AND :end')
            ->orderBy('s.start', 'asc')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
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
