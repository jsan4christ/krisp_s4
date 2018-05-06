<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/05/05
 * Time: 20:05
 */

namespace App\Repository;


use App\Entity\BPublications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class PubsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BPublications::class);
    }



}