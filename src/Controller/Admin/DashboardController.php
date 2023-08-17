<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Company\CompanyCrudController;
use App\Entity\CategoryGroup;
use App\Entity\News;
use App\Entity\Album;
use App\Entity\Image;
use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
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
        ];
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
