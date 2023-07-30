<?php

namespace App\Controller\Admin\Company;

use App\Entity\Company;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class CompanyCrudController extends AbstractCrudController
{

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Company::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            Field::new('street_name'),
            Field::new('street_nr'),
            Field::new('postal_code'),
            Field::new('postal_city'),
            Field::new('phone'),
            Field::new('email'),
            Field::new('vat'),
//            TextEditorField::new('description'),
        ];
    }


    public function configureActions(Actions $actions): Actions
    {
        if ($this->entityManager->getRepository(Company::class)->CountCompanies() === 1) {
            return $actions
                ->remove(Crud::PAGE_INDEX, Action::NEW)

                ;
        } else {
            return $actions
                ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER);
        }
    }
}
