<?php

namespace App\Controller\Admin\Service;

use App\Entity\CategoryGroup;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryGroupCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategoryGroup::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
        ];
    }

}
