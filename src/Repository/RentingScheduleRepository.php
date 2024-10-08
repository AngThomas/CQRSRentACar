<?php

namespace App\Repository;

use App\DTO\CarOfferSearchDTO;
use App\Entity\RentingSchedule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RentingSchedule>
 */
class RentingScheduleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentingSchedule::class);
    }

    public function findByIdAndDates(CarOfferSearchDTO $dto): ?RentingSchedule
    {
        return $this->createQueryBuilder('rs')
            ->where('rs.carOffer = :carOfferId')
            ->andWhere('rs.rentedTo >= :dateFrom')
            ->andWhere('rs.rentedFrom <= :dateTo')
            ->setParameter('carOfferId', $dto->getCarOfferId())
            ->setParameter('rentedFrom', $dto->getRentedFrom())
            ->setParameter('rentedTo', $dto->getRentedTo())
            ->getQuery()
            ->getOneOrNullResult();

    }
    //    /**
    //     * @return RentingSchedule[] Returns an array of RentingSchedule objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RentingSchedule
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
