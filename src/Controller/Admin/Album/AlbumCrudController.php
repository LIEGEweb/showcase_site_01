<?php

namespace App\Controller\Admin\Album;

use App\Entity\Album;
use App\Entity\Image;
use App\Form\PhotoImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AlbumCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Album::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setColumns(16),
            TextField::new('description')->setColumns(16),
            CollectionField::new('images')
                ->useEntryCrudForm(ImageCrudController::class,
                'new')
                ->setEntryIsComplex(),
//               ->setEntryType(PhotoImageType::class)
//               ->setEntryIsComplex(),
//            AssociationField::new('images'),
            BooleanField::new('published')
        ];
    }

}
