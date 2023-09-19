<?php

namespace App\Controller\Public\Home;

use App\Entity\CategoryGroup;
use App\Entity\News;
use App\Entity\Setup;
use App\Repository\CategoryGroupRepository;
use App\Repository\ImageRepository;
use App\Repository\NewsRepository;
use App\Repository\AlbumRepository;
use App\Repository\SetupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryGroupRepository $categoryGroupRepository,
                          NewsRepository          $newsRepository,
                          ImageRepository         $imageRepository,
                          SetupRepository $setupRepository): Response
    {
        $setup = $setupRepository->homeSetup();
        $servicesByCategoryGroup = $categoryGroupRepository->findAllWithServices();

        $s = [];
        if (!empty($servicesByCategoryGroup)) {
            foreach ($servicesByCategoryGroup as $category) {
                foreach ($category->getServices() as $service) {
                    if (!empty($service->getImage())) $s[] = $service->getImage();
                }
            }
            shuffle($s);
        }
        $news = $newsRepository->findFrontNews();

        return $this->render('themes/' . $this->getParameter('app.theme') . '/home/index.html.twig', [
            'setup' => $setup,
//            'setup' => $setupRepository->homeSetup() ? $setupRepository->homeSetup() : null,
            'servicesByCategoryGroup' => $servicesByCategoryGroup,
            "servicesImages" => $s,
            "news" => $news,
            'images_from_albums' => $imageRepository->findRandomMultiple()
        ]);
    }
}
