<?php

namespace App\Controller\Admin\Service;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setColumns(16),
            TextEditorField::new('description')->setColumns(16)->setNumOfRows(15),
            AssociationField::new('category'),
            ImageField::new('image')
                ->setBasePath('images/services/')
                ->setUploadDir('public/images/services/')
        ];
    }

}
