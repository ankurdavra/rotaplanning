<?php

namespace App\Repository;

use App\Entity\Rotas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rotas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rotas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rotas[]    findAll()
 * @method Rotas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RotasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rotas::class);
    }

    // /**
    //  * @return Rotas[] Returns an array of Rotas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rotas
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
