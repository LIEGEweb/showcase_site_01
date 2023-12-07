<?php

namespace App\Controller\Admin\News;

use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')->setColumns(16),
            TextField::new('excerpt')->setColumns(16),
            TextEditorField::new('content')->setColumns(16)->setNumOfRows(15),
            ImageField::new('image')
                ->setBasePath('images/news/')
                ->setUploadDir('public/images/news/'),
            BooleanField::new('published')
        ];
    }

}
