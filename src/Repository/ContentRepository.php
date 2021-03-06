<?php

namespace App\Repository;

use App\Entity\Content;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Content|null find($id, $lockMode = null, $lockVersion = null)
 * @method Content|null findOneBy(array $criteria, array $orderBy = null)
 * @method Content[]    findAll()
 * @method Content[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Content::class);
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

    public function findContentByKeyAndLang($value, $sectionName, $lang): ?string
    {
         $content = $this->createQueryBuilder('c')
                ->join('c.section','s')
                ->andWhere('s.name = :sectionName')
                ->andWhere('c.content_key = :val')
                ->setParameter('val', $value)
                ->setParameter('sectionName', $sectionName)
                ->getQuery()
                ->getOneOrNullResult();
         if ($content == null ) {
             return "";
         }
         if ($lang == 'fr') {
             return $content->getContentFr();
         } else {
             return $content->getContentEn();
         }
    }
}
