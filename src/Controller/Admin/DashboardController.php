<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Company\CompanyCrudController;
use App\Entity\CategoryGroup;
use App\Entity\Message;
use App\Entity\News;
use App\Entity\Album;
use App\Entity\Image;
use App\Entity\Service;
use App\Entity\Setup;
use App\Entity\SocialNetwork;
use App\Repository\SetupRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    private ?int $setupId = null;
    public function __construct(private EntityManagerInterface $manager)
    {
        if (count($this->manager->getRepository(Setup::class)->findAll()) === 0){
            $setup = new Setup();
            $setup->setHomeHeadline("Ma phrase d'accroche");
            $setup->setHomeSubHeadline("une mini phrase en plus");
            $setup->setHomeCtaButton("Action");
            $setup->setHomeSecondaryButton("Autre action");
            $manager->persist($setup);
            $manager->flush();

//            $this->redirectToRoute("admin");
        }

        $this->setupId = $this->manager->getRepository(Setup::class)->getFirstId();

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CompanyCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Showcase Site 01');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa-solid fa-home'),
            MenuItem::subMenu('Services', 'fa-solid fa-tags')->setSubItems([
                MenuItem::linkToCrud('Categories', null, CategoryGroup::class),
                MenuItem::linkToCrud('Services', null, Service::class),
            ]),
            MenuItem::linkToCrud('News', 'fa-solid fa-newspaper', News::class),
            MenuItem::subMenu('Albums photos', 'fa-solid fa-tags')->setSubItems([
                MenuItem::linkToCrud('Albums', 'fa-solid fa-images', Album::class),
                MenuItem::linkToCrud('Photos', 'fa-regular fa-image', Image::class),
            ]),
            MenuItem::linkToCrud('Reseaux Sociaux', 'fa-solid fa-newspaper', SocialNetwork::class),
            MenuItem::linkToCrud('Messages', 'fa-solid fa-envelope', Message::class),
            MenuItem::linkToCrud('Configuration', 'fa-solid fa-cog', Setup::class)->setAction('edit')->setEntityId($this->setupId),
        ];
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
