<?php

namespace App\Repository;

use App\Entity\CarOfferListing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use RentingAvailabilityDTO;

/**
 * @extends ServiceEntityRepository<CarOfferListing>
 */
class CarOfferListingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarOfferListing::class);
    }

    /**
     * @return CarOfferListing[]
     */
    public function getAvailableCarOffers(RentingAvailabilityDTO $dto): array
    {
        return $this->createQueryBuilder('col')
            ->join('col.carOffer', 'co')
            ->leftJoin('co.rentingSchedules', 'rs')
            ->where('rs.id IS NULL')
            ->orWhere('rs.dateTo < :dateFrom')
            ->orWhere('rs.dateFrom < :dateTo')
            ->orWhere('rs.dateTo > :dateTo')
            ->setParameter('dateFrom', $dto->getDateFrom())
            ->setParameter('dateTo', $dto->getDateTo())
            ->getQuery()
            ->getResult();
    }
    //    /**
    //     * @return CarOfferListing[] Returns an array of CarOfferListing objects
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

    //    public function findOneBySomeField($value): ?CarOfferListing
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
