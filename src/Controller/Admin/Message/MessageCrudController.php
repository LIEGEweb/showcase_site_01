<?php

namespace App\Controller\Admin\Message;

use App\Entity\Message;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }


//    public function configureFields(string $pageName): iterable
//    {
//        return [
//            TextField::new('name'),
//            TextField::new('email'),
//            TextField::new('phone'),
//            TextField::new('message'),
//        ];
//    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Crud::PAGE_EDIT, Action::EDIT)
            ->disable(Crud::PAGE_NEW, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);

    }

}
