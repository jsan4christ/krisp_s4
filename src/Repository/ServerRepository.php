<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/05
 * Time: 04:21
 */

namespace App\Repository;

use App\Entity\BServer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ServerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BServer::class);
    }
}