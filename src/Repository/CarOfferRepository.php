<?php

namespace App\Repository;

use App\DTO\CarOfferSearchDTO;
use App\Entity\CarOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarOffer>
 */
class CarOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarOffer::class);
    }

    /**
     * @return CarOffer[]
     */
    public function getAvailableCarOffers(CarOfferSearchDTO $dto): array
    {
        return $this->createQueryBuilder('co')
            ->leftJoin('co.rentingSchedule', 'rs')
            ->where('rs.id IS NULL')
            ->orWhere('rs.rentedTo < :rentedFrom')
            ->orWhere('rs.rentedFrom < :rentedTo')
            ->orWhere('rs.rentedTo > :rentedTo')
            ->setParameter('rentedFrom', $dto->getRentedFrom())
            ->setParameter('rentedTo', $dto->getRentedTo())
            ->getQuery()
            ->getResult();
    }
    //    /**
    //     * @return CarOffer[] Returns an array of CarOffer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CarOffer
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
