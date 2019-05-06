<?php

namespace App\Repository;

use App\Entity\Matcher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Matcher|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matcher|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matcher[]    findAll()
 * @method Matcher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatcherRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Matcher::class);
    }

    // /**
    //  * @return Matcher[] Returns an array of Matcher objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Matcher
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
