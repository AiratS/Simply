<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\UserPhoto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserPhoto|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPhoto|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPhoto[]    findAll()
 * @method UserPhoto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserPhoto::class);
    }
}
