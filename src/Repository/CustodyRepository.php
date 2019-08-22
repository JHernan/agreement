<?php

namespace App\Repository;

use App\Entity\Custody;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Custody|null find($id, $lockMode = null, $lockVersion = null)
 * @method Custody|null findOneBy(array $criteria, array $orderBy = null)
 * @method Custody[]    findAll()
 * @method Custody[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustodyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Custody::class);
    }

    // /**
    //  * @return Custody[] Returns an array of Custody objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Custody
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
