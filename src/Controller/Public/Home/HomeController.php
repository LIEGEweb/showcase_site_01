<?php

namespace App\Controller\Public\Home;

use App\Dto\GlobalActiveSections;
use App\Dto\MessageDto;
use App\Entity\CategoryGroup;
use App\Entity\Image;
use App\Entity\Message;
use App\Entity\News;
use App\Entity\SectionManager;
use App\Entity\Setup;
use App\Entity\SocialNetwork;
use App\Form\MessageType;
use App\Mapper\MessageDtoMapper;
use App\Mapper\SetupDtoMapper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, MessageDtoMapper $messageDtoMapper, Request $request): Response
    {
        $setup = $entityManager->getRepository(Setup::class)->homeSetup();
        $images = $entityManager->getRepository(Image::class)->findPinned();
        $servicesByCategoryGroup = $entityManager->getRepository(CategoryGroup::class)->findAllWithServices();
        $serviceSection = $entityManager->getRepository(Setup::class)->serviceSetup();
        $news = $entityManager->getRepository(News::class)->findFrontNews();

        $messageDto = new MessageDto();

        $form = $this->createForm(MessageType::class, $messageDto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $messageDtoMapper::toEntity($messageDto);
            $entityManager->persist($message);
            $entityManager->flush();
        }

        return $this->render('/home/index.html.twig', [
            'serviceSection' => $serviceSection,
            'servicesByCategoryGroup' => $servicesByCategoryGroup,
            "news" => $news,
            'setup' => SetupDtoMapper::toDto($setup),
            "albumHeader" => $setup->getAlbumHeader(),
            "socialHeader" => $setup->getSocialHeader(),
            "contactLandingHeader" => $setup->getContactLandingHeader(),
            'images' => $images,
            'form' => $form
        ]);
    }
}
