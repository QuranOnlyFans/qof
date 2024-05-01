<?php

namespace App\Repository;

use App\Entity\Juz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Juz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Juz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Juz[]    findAll()
 * @method Juz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JuzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Juz::class);
    }

    // Add custom repository methods here
}
