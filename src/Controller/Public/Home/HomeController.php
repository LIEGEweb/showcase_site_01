<?php

namespace App\Controller\Public\Home;

use App\Entity\CategoryGroup;
use App\Repository\CategoryGroupRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $servicesByCategoryGroup = $entityManager->getRepository(CategoryGroup::class)->findAllWithServices();

        foreach ($servicesByCategoryGroup as $category){
           foreach ($category->getServices() as $service){
               $s[] = $service->getImage();
           }
       }
        shuffle($s);

        return $this->render('themes/' . $this->getParameter('app.theme') . '/home/index.html.twig', [
            'servicesByCategoryGroup' =>  $servicesByCategoryGroup,
            "servicesImages" => $s
        ]);
    }
}
