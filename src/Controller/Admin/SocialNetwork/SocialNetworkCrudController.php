<?php

namespace App\Controller\Admin\SocialNetwork;

use App\Entity\SocialNetwork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SocialNetworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SocialNetwork::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('name')->setChoices([
                'Facebook'=>'Facebook',
                'Instagram'=>'Instagram',
                'TikTok'=>'TikTok',
                'Twitter'=>'Twitter',
                'LinkedIn'=>'LinkedIn',
                'Autre' => 'Autre'
            ])
                ->autocomplete(),
            TextField::new('url'),
        ];
    }

}
