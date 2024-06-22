<?php

namespace App\Controller\Admin\Album;

use App\Dto\GlobalActiveSections;
use App\Entity\Album;
use App\Entity\Image;
use App\Repository\AlbumRepository;
use App\Repository\ImageRepository;
use App\Repository\SectionManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ImageCrudController extends AbstractCrudController
{
    public function __construct(private GlobalActiveSections   $activeSections,
                                private ImageRepository        $imageRepository,
                                private AlbumRepository        $albumRepository,
                                private EntityManagerInterface $entityManager)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        if ($this->activeSections->photo()) return $actions;
        elseif ($this->activeSections->photoLanding()) {
            if ($this->imageRepository->count([]) === 3)
                return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
            elseif ($this->imageRepository->count([]) === 2)
                return $actions->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER);
//        elseif ($this->imageRepository->count([]) > 1) {
//            return $actions
//                ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
//                ->remove(Crud::PAGE_NEW, Action::SAVE_AND_RETURN)
//                ->remove(Crud::PAGE_INDEX, Action::NEW);
//        }
            else {
                return $actions;
//                ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER);
            }
        } else return $actions
            ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER)
            ->remove(Crud::PAGE_NEW, Action::SAVE_AND_RETURN)
            ->remove(Crud::PAGE_INDEX, Action::NEW);
    }

    public function configureFields(string $pageName): iterable
    {
        if ($this->activeSections->photo()) {
            yield TextField::new('alt')->setColumns(16);
            yield ImageField::new('FileName')
                ->setBasePath('images/albums/')
                ->setUploadDir('public/images/albums/');
            yield AssociationField::new('album');
            yield BooleanField::new('pinned');
            yield BooleanField::new('published');

        } elseif ($this->activeSections->photoLanding()) {
            yield TextField::new('alt')->setColumns(16);
            yield ImageField::new('FileName')
                ->setBasePath('images/albums/')
                ->setUploadDir('public/images/albums/');
            yield BooleanField::new('pinned');
            yield BooleanField::new('published');
        } else return [];
    }

    public function createEntity(string $entityFqcn)
    {
        if (!$this->activeSections->photo() && $this->activeSections->photoLanding()) {
            $album = $this->createDefaultAlbum();
            $photo = new Image();
            $photo->setAlbum($album);
            return $photo;
        }
    }

    public function createDefaultAlbum()
    {
        if (!$this->activeSections->photo() && $this->activeSections->photoLanding()) {
            if (!$album = $this->albumRepository->findOneBy(['name' => 'Free'])) {
                $album = new Album();
                $album->setName('Free');
                $this->entityManager->persist($album);
                $this->entityManager->flush();
                return $album;
            } else return $album;
        }
    }
}
