<?php

namespace App\Repository;

use App\Entity\BDSContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BDSContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method BDSContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method BDSContent[]    findAll()
 * @method BDSContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BDSContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BDSContent::class);
    }

    // /**
    //  * @return CustomizableContent[] Returns an array of CustomizableContent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findContentByKeyAndLang($value, $lang): ?string
    {
         $bdsContent = $this->createQueryBuilder('c')
                ->andWhere('c.content_key = :val')
                ->setParameter('val', $value)
                ->getQuery()
                ->getOneOrNullResult();
         if ($lang == 'fr') {
             return $bdsContent->getContentFr();
         } else {
             return $bdsContent->getContentEn();
         }
    }
}
