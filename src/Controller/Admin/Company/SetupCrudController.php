<?php

namespace App\Controller\Admin\Company;

use App\Entity\SectionManager;
use App\Entity\Setup;
use App\Repository\SetupRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SetupCrudController extends AbstractCrudController
{
    public function __construct(private EntityManagerInterface $manager)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Setup::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if ($this->manager->getRepository(SectionManager::class)->findOneBy(['name' => 'hero'])->isActive())
            return [

                TextField::new('home_headline', 'Accroche')->setColumns(16),
                TextField::new('home_sub_headline', 'Sous-titre')->setColumns(16),
                TextField::new('home_cta_button', 'Action principale'),
                TextField::new('home_cta_action', 'Lien action principale'),
                TextField::new('home_secondary_button', 'Action secondaire'),
                TextField::new('home_secondary_action', 'Lien action secondaire'),
                ImageField::new('home_cta_image', 'Image')
                    ->setBasePath('images/home/')
                    ->setUploadDir('public/images/home/'),
                TextField::new('home_cta_image_alt')
            ];
        else return [];
    }

    public function configureActions(Actions $actions): Actions
    {

//        if (false === $this->manager->getRepository(SectionManager::class)->findOneBy(['name'=> 'hero'])->isActive())
//            return $this->redirectToRoute('admin');
        /*
                if ($this->entityManager->getRepository(Setup::class)->countSetups() === 1) {
                    return $actions
                        ->remove(Crud::PAGE_INDEX, Action::NEW)

                        ;
                } else {
                    return $actions
                        ->remove(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER);
                }*/
        return $actions
            ->disable(Crud::PAGE_INDEX, Action::INDEX)
            ->remove(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN)
//            ->disable(Crud::PAGE_EDIT, Action::NEW)//
            //            ->add(Crud::PAGE_INDEX, Action::DETAIL);
            ;
    }


}
