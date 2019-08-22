<?php

namespace App\Repository;

use App\Entity\PickUp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PickUp|null find($id, $lockMode = null, $lockVersion = null)
 * @method PickUp|null findOneBy(array $criteria, array $orderBy = null)
 * @method PickUp[]    findAll()
 * @method PickUp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PickUpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PickUp::class);
    }

    // /**
    //  * @return PickUp[] Returns an array of PickUp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PickUp
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
