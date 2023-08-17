<?php

namespace App\Repository;

use App\Entity\Album;
use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Album>
 *
 * @method Album|null find($id, $lockMode = null, $lockVersion = null)
 * @method Album|null findOneBy(array $criteria, array $orderBy = null)
 * @method Album[]    findAll()
 * @method Album[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, EntityManagerInterface $entityManager)
    {
        parent::__construct($registry, Album::class);
    }

    /**
     * @return Album[] Returns an array of PhotosAlbum objects
     */
    public function findAllWithFirstImage(): array
    {
        $subQueryBuilder = $this->_em->createQueryBuilder()
            ->select('MIN(i2.id)')
            ->from(Image::class, 'i2')
            ->where('i2.album = a.id')
            ->andWhere('i2.published = :published')

        ;

        return $this->createQueryBuilder('a')
            ->andWhere('a.published = :published')
            ->setParameter('published', true)
            ->leftJoin('a.images', 'i')
            ->addSelect('i')
            ->andWhere('i.id = (' . $subQueryBuilder->getDQL() . ')')
            ->setParameter('published', true)
            ->getQuery()
            ->getResult();
    }

    public function findOneBySlug($slug){
        return $this->createQueryBuilder('a')
            ->andWhere('a.published = :published')
            ->andWhere('a.slug = :slug')
            ->setParameters(['published'=> true, 'slug' => $slug])
            ->leftJoin('a.images', 'i')
            ->select('a, i')
            ->getQuery()
            ->getOneOrNullResult();
    }
//    /**
//     * @return PhotosAlbum[] Returns an array of PhotosAlbum objects
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

//    public function findOneBySomeField($value): ?PhotosAlbum
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
