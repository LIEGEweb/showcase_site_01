<?php

namespace App\Controller\Public\Home;

use App\Entity\CategoryGroup;
use App\Entity\News;
use App\Entity\SectionManager;
use App\Entity\Setup;
use App\Repository\CategoryGroupRepository;
use App\Repository\ImageRepository;
use App\Repository\NewsRepository;
use App\Repository\AlbumRepository;
use App\Repository\SectionManagerRepository;
use App\Repository\SetupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CategoryGroupRepository  $categoryGroupRepository,
                          NewsRepository           $newsRepository,
                          ImageRepository          $imageRepository,
                          SetupRepository          $setupRepository,
                          SectionManagerRepository $managerRepository): Response
    {
        $managerRepository->findOneBy(['name' => 'hero'])->isActive() ? $setup = $setupRepository->homeSetup() : $setup = null;
        $managerRepository->findOneBy(['name' => 'service'])->isActive() ? $servicesByCategoryGroup =$categoryGroupRepository->findAllWithServices() : $servicesByCategoryGroup = null;
        $serviceSection = $setupRepository->serviceSetup();
        $homeSetup = $setupRepository->homeSetup()[0];

        $news = $newsRepository->findFrontNews();

        return $this->render('/home/index.html.twig', [
            'setup' => $setup,
            'serviceSection'  => $serviceSection,
            'servicesByCategoryGroup' => $servicesByCategoryGroup,
            "news" => $news,
            "album_header" => $homeSetup->getAlbumHeader(),
            'images' => $imageRepository->findPinned()
        ]);
    }
}
