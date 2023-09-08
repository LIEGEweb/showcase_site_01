<?php

namespace App\Controller\Public\Service;


use App\Repository\ServiceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{

    #[Route('/services', name: 'app_services')]
    public function index(ServiceRepository $serviceRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $services = $paginator->paginate(
            $serviceRepository->paginateServices(),
            $request->query->getInt('page', 1),
            $this->getParameter('app.news_per_page'));
//        $services = $serviceRepository->findAll();

        return $this->render('themes/' . $this->getParameter('app.theme') . '/service/index.html.twig', [
            'services' => $services,
        ]);
    }
}
