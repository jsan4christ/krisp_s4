<?php

namespace App\Repository;

use App\Entity\BSwCat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BSwCat|null find($id, $lockMode = null, $lockVersion = null)
 * @method BSwCat|null findOneBy(array $criteria, array $orderBy = null)
 * @method BSwCat[]    findAll()
 * @method BSwCat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BSwCatRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BSwCat::class);
    }

//    /**
//     * @return BSwCat[] Returns an array of BSwCat objects
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
    public function findOneBySomeField($value): ?BSwCat
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
