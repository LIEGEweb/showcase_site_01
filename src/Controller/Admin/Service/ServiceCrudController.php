<?php

namespace App\Controller\Admin\Service;

use App\Entity\SectionManager;
use App\Entity\Service;
use App\Repository\SectionManagerRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public function __construct(private SectionManagerRepository $manager)
    {
    }
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if ($this->manager->findOneBy(['name' => 'service'])->isActive())
        return [
            TextField::new('name')->setColumns(16),
            TextEditorField::new('description')->setColumns(16)->setNumOfRows(15),
            AssociationField::new('category'),
            ImageField::new('image')
                ->setBasePath('images/services/')
                ->setUploadDir('public/images/services/')
        ];
        else {
            return [];
        }
    }

}
