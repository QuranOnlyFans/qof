<?php

namespace App\Repository;

use App\Entity\Ayah;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ayah|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ayah|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ayah[]    findAll()
 * @method Ayah[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AyahRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ayah::class);
    }

    // Add custom repository methods here
}
