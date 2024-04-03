<?php

namespace App\Repository;

use App\Entity\CategoryName;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryName>
 *
 * @method CategoryName|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryName|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryName[]    findAll()
 * @method CategoryName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryName::class);
    }

//    /**
//     * @return CategoryName[] Returns an array of CategoryName objects
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

//    public function findOneBySomeField($value): ?CategoryName
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
