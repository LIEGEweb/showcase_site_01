<?php

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Image>
 *
 * @method Image|null find($id, $lockMode = null, $lockVersion = null)
 * @method Image|null findOneBy(array $criteria, array $orderBy = null)
 * @method Image[]    findAll()
 * @method Image[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Image::class);
    }

    /**
     * @return Image|null
     */
    public function findRandomOne(): ?array
    {
        $images = $this->createQueryBuilder('i')
            ->getQuery()
            ->getArrayResult();
        shuffle($images);
        return $images[0];
    }

    public function findRandomMultiple($limit = 6): ?array
    {
        $images_all = $this->createQueryBuilder('i')
            ->leftJoin('i.album', 'album')
            ->select('i, album')
            ->getQuery()
            ->getArrayResult();
        shuffle($images_all);
        return array_slice($images_all, 0, $limit);
    }
//    /**
//     * @return PhotosImages[] Returns an array of PhotosImages objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Image
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
