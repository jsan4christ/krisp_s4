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
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Doctrine\ORM\Query;

class PubsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BPublications::class);
    }

    public function findAllPaginated(int $page = 1): Pagerfanta
    {
        $query = $this->getEntityManager()->createQuery('
        SELECT p FROM App:BPublications p
        ');

        return $this->createPaginator($query, $page);
    }

    public  function createPaginator(Query $query, int $page): Pagerfanta
    {
        $paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(BPublications::NUMS_ITEMS);
        $paginator->setCurrentPage($page);

        return $paginator;
    }


}