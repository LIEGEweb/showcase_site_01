<?php

namespace App\Repository;

use App\Entity\Setup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Setup>
 *
 * @method Setup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Setup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Setup[]    findAll()
 * @method Setup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SetupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Setup::class);
    }

    public function homeSetup()
    {
        return $this->createQueryBuilder('s')
            ->addSelect('s.homeHeadline AS headline')
            ->addSelect('s.homeSubHeadline AS sub_headline')
            ->addSelect('s.homeCtaButton AS cta_button')
            ->addSelect('s.homeSecondaryButton AS secondary_button')
            ->addSelect('s.homeCtaImage AS cta_image')
            ->addSelect('s.homeCtaImageAlt AS cta_image_alt')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function countSetups(): ?int
    {
        return $this->createQueryBuilder('s')
            ->select('SUM(s.id) AS count')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getFirstId(): ?int
    {
        $query = $this->createQueryBuilder('s')
            ->getQuery()
            ->getResult();

        if ($query) return $query[0]->getId();
        else return null;
    }

//    /**
//     * @return Setup[] Returns an array of Setup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Setup
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
