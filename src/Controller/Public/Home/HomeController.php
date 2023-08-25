<?php

namespace App\Controller\Public\Home;

use App\Entity\CategoryGroup;
use App\Entity\News;
use App\Repository\CategoryGroupRepository;
use App\Repository\NewsRepository;
use App\Repository\AlbumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryGroupRepository $categoryGroupRepository,
                          NewsRepository          $newsRepository,
                          AlbumRepository         $albumRepository): Response
    {
        $servicesByCategoryGroup = $categoryGroupRepository->findAllWithServices();

        if (!empty($servicesByCategoryGroup)) {
            foreach ($servicesByCategoryGroup as $category) {
                foreach ($category->getServices() as $service) {
                    $s[] = $service->getImage();
                }
            }
            shuffle($s);
        }
        $news = $newsRepository->findFrontNews();

        return $this->render('themes/' . $this->getParameter('app.theme') . '/home/index.html.twig', [
            'servicesByCategoryGroup' => $servicesByCategoryGroup,
            "servicesImages" => $s,
            "news" => $news,
            'albums' => $albumRepository->findAllWithFirstImage()
        ]);
    }
}
