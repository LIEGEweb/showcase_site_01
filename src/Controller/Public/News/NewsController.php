<?php

namespace App\Controller\Public\News;

use App\Entity\News;
use App\Repository\NewsRepository;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/articles', name: 'app_news')]
    public function index(NewsRepository $newsRepository, PaginatorInterface $paginator, Request $request ): Response
    {
        $news = $paginator->paginate(
            $newsRepository->findAlStartingAt(),
            $request->query->getInt('page', 1),
            $this->getParameter('app.news_per_page'));
        return $this->render('themes/' . $this->getParameter('app.theme') . '/news/index.html.twig', [
            'news' => $news,
        ]);
    }

    #[Route('/article/{slug}', name: 'app_news_show')]
    public function show(News $news, Request $request ): Response
    {
        return $this->render('themes/' . $this->getParameter('app.theme') . '/news/show.html.twig', [
            'news' => $news,
        ]);
    }
}