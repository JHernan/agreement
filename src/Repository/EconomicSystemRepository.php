<?php

namespace App\Repository;

use App\Entity\EconomicSystem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EconomicSystem|null find($id, $lockMode = null, $lockVersion = null)
 * @method EconomicSystem|null findOneBy(array $criteria, array $orderBy = null)
 * @method EconomicSystem[]    findAll()
 * @method EconomicSystem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EconomicSystemRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EconomicSystem::class);
    }

    // /**
    //  * @return EconomicSystem[] Returns an array of EconomicSystem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EconomicSystem
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
