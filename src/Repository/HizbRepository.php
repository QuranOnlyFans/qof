<?php

namespace App\Repository;

use App\Entity\Hizb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hizb|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hizb|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hizb[]    findAll()
 * @method Hizb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HizbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hizb::class);
    }

    // Add custom repository methods here
}
