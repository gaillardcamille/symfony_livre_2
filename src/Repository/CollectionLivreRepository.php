<?php

namespace App\Repository;

use App\Entity\CollectionLivre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CollectionLivre>
 *
 * @method CollectionLivre|null find($id, $lockMode = null, $lockVersion = null)
 * @method CollectionLivre|null findOneBy(array $criteria, array $orderBy = null)
 * @method CollectionLivre[]    findAll()
 * @method CollectionLivre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CollectionLivreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CollectionLivre::class);
    }

//    /**
//     * @return CollectionLivre[] Returns an array of CollectionLivre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CollectionLivre
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
