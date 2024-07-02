<?php

namespace App\Controller\Admin\Company;

use App\Dto\GlobalActiveSections;
use App\Entity\SectionManager;
use App\Entity\Setup;
use App\Repository\SetupRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SetupCrudController extends AbstractCrudController
{
    public function __construct(private EntityManagerInterface $manager, private GlobalActiveSections $activeSections)
    {
    }

    public static function getEntityFqcn(): string
    {
        return Setup::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if ($this->manager->getRepository(SectionManager::class)->findOneBy(['name' => 'hero'])->isActive()) {
            yield TextField::new('home_headline', 'Accroche')->setColumns(16);
            yield TextField::new('home_sub_headline', 'Sous-titre')->setColumns(16);
            yield TextField::new('home_cta_button', 'Action principale');
            yield TextField::new('home_cta_action', 'Lien action principale');
            yield TextField::new('home_secondary_button', 'Action secondaire');
            yield TextField::new('home_secondary_action', 'Lien action secondaire');
            yield ImageField::new('home_cta_image', 'Image')
                ->setBasePath('images/home/')
                ->setUploadDir('public/images/home/');
            yield TextField::new('home_cta_image_alt');
        }
        yield TextField::new('service_title', 'Titre')->setColumns(16);
        yield TextField::new('service_header', 'Sous-titre')->setColumns(16);
        yield TextField::new('service_description', 'Description')->setColumns(16);
        if ($this->activeSections->photoLanding()){
            yield AssociationField::new('albumHeader', 'Entête photos')
                ->addCssClass('font-black pl-12')
                ->renderAsEmbeddedForm()
                ->setColumns('w-full');
        }
        if ($this->activeSections->social()){
            yield AssociationField::new('socialHeader', 'Reseaux Sociaux')
                ->addCssClass('font-black pl-12')
                ->renderAsEmbeddedForm()
                ->setColumns('w-full');
        }
        if ($this->activeSections->contactLanding()){
            yield AssociationField::new('contactLandingHeader', 'Contact d\'accueil')
                ->addCssClass('font-black pl-12')
                ->renderAsEmbeddedForm()
                ->setColumns('w-full');
        }
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
