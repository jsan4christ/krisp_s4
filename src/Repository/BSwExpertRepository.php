<?php

namespace App\Repository;

use App\Entity\BSwExpert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BSwExpert|null find($id, $lockMode = null, $lockVersion = null)
 * @method BSwExpert|null findOneBy(array $criteria, array $orderBy = null)
 * @method BSwExpert[]    findAll()
 * @method BSwExpert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BSwExpertRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BSwExpert::class);
    }

//    /**
//     * @return BSwExpert[] Returns an array of BSwExpert objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BSwExpert
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
