<?php

namespace App\Repository;

use App\Entity\AyahEdition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AyahEdition|null find($id, $lockMode = null, $lockVersion = null)
 * @method AyahEdition|null findOneBy(array $criteria, array $orderBy = null)
 * @method AyahEdition[]    findAll()
 * @method AyahEdition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AyahEditionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AyahEdition::class);
    }

    // Add custom repository methods here
}
