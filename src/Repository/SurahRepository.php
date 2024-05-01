<?php

namespace App\Repository;

use App\Entity\Surah;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Surahs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Surahs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Surahs[]    findAll()
 * @method Surahs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SurahRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Surah::class);
    }

    // Add custom repository methods here
}
