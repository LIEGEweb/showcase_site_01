<?php

namespace App\Controller\Public\Home;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('themes/'.$this->getParameter('app.theme').'/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
