<?php

namespace App\Controller\Admin;

use App\Entity\SectionHeader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SectionHeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SectionHeader::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre principal'),
            TextField::new('header', 'Sous-titre')->setColumns('w-full'),
            TextField::new('description', 'Description')->setColumns('w-full'),
        ];
    }

}
