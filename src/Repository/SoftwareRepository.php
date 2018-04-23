<?php

namespace App\Repository;

use App\Entity\BInstalledSw;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * This custom Doctrine repository contains some methods which are useful when
 * querying for software information.
 *
 * See https://symfony.com/doc/current/doctrine/repository.html
 */
class SoftwareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BInstalledSw::class);
    }

    public function findAllPaginate(int $page = 1): Pagerfanta
    {
        $query = $this->getEntityManager()
            ->createQuery('
                SELECT s
                FROM App:BInstalledSw s
            ')
        ;

        return $this->createPaginator($query, $page);
    }

    private function createPaginator(Query $query, int $page): Pagerfanta
    {
        $paginator = new Pagerfanta(new DoctrineORMAdapter($query));
        $paginator->setMaxPerPage(BInstalledSw::NUM_ITEMS);
        $paginator->setCurrentPage($page);

        return $paginator;
    }

    public function getSoftwareDetails($sw_id)
    {
        $em = $this->getEntityManager();

        $dql = $em->createQuery('SELECT s FROM App\Entity\BInstalledSw s WHERE s.swId = :sw_id');
        $dql->setParameter('sw_id', $sw_id);
        return $dql->getResult();
    }

    /**
     * @return BInstalledSw[]
     */
    public function findBySearchQuery(string $rawQuery, int $limit = BInstalledSw::NUM_ITEMS): array
    {
        $query = $this->sanitizeSearchQuery($rawQuery);
        //dump($query);
        $searchTerms = $this->extractSearchTerms($query);
        //dump($searchTerms);
        if(0 === count($searchTerms)){
            return [];
        }

        $queryBuilder = $this->createQueryBuilder('s');

        foreach ($searchTerms as $key => $term) {
            $queryBuilder
                ->orWhere('s.swName LIKE :t_'.$key)
                ->setParameter('t_'.$key, '%'.$term.'%')
                ;
        }

        return $queryBuilder
                    ->orderBy('p.swName', 'DESC')
                    ->setMaxResults($limit)
                    ->getQuery()
                    ->getResult();
    }


    /**
     * Removes all non-alphanumeric characters except whitespaces.
     */
    private function sanitizeSearchQuery(string $query): string
    {
        return preg_replace('/[^[:alnum:] ]/', '', trim(preg_replace('/[[:space:]]+/', ' ', $query)));
    }

    /**
     * Splits the search query into terms and removes the ones which are irrelevant.
     */
    private function extractSearchTerms(string $searchQuery): array
    {
        $terms = array_unique(explode(' ', mb_strtolower($searchQuery)));

        return array_filter($terms, function ($term) {
            return 2 <= mb_strlen($term);
        });
    }

    public function findAllWithSvrAndSwNames($sw_id)
    {
       //$dql = createQuery
        $em = $this->getEntityManager();


        $dql = $em->createQuery(
            'SELECT s, e FROM App\Entity\BInstalledSw s LEFT JOIN s.experts e WHERE s.swId = :swId'
        );
        $dql->setParameter('swId', $sw_id);
        $sw = $dql->getResult();

        dump($sw);
        return $sw;
    }
//SELECT s, l, e FROM App\Entity\BInstalledSw s JOIN s.locations l JOIN s.experts e WHERE s.swId= :sw_id
}
