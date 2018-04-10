<?php

namespace App\Repository;

use App\Entity\BSwExpert;
use App\Entity\BServer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BSwExpert|null find($id, $lockMode = null, $lockVersion = null)
 * @method BSwExpert|null findOneBy(array $criteria, array $orderBy = null)
 * @method BSwExpert[]    findAll()
 * @method BSwExpert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BSwExpert::class);
    }


}