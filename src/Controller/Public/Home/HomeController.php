<?php

namespace App\Controller\Public\Home;

use App\Dto\GlobalActiveSections;
use App\Entity\CategoryGroup;
use App\Entity\Image;
use App\Entity\Message;
use App\Entity\News;
use App\Entity\SectionManager;
use App\Entity\Setup;
use App\Entity\SocialNetwork;
use App\Form\MessageType;
use App\Repository\CategoryGroupRepository;
use App\Repository\ImageRepository;
use App\Repository\NewsRepository;
use App\Repository\AlbumRepository;
use App\Repository\SectionManagerRepository;
use App\Repository\SetupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        $setup = $entityManager->getRepository(Setup::class)->homeSetup();
        $images = $entityManager->getRepository(Image::class)->findPinned();
        $servicesByCategoryGroup = $entityManager->getRepository(CategoryGroup::class)->findAllWithServices();
        $serviceSection = $entityManager->getRepository(Setup::class)->serviceSetup();
        $news = $entityManager->getRepository(News::class)->findFrontNews();

        return $this->render('/home/index.html.twig', [
            'serviceSection' => $serviceSection,
            'servicesByCategoryGroup' => $servicesByCategoryGroup,
            "news" => $news,
            'setup' => $setup,
            "albumHeader" => $setup->getAlbumHeader(),
            "socialHeader" => $setup->getSocialHeader(),
            'images' => $images,
        ]);
    }
}
