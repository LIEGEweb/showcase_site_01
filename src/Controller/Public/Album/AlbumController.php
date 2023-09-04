<?php

namespace App\Controller\Public\Album;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{

    public function __construct(protected AlbumRepository $albumRepository)
    {
    }

    #[Route('/albums', name: 'app_albums_index')]
    public function index(ImageRepository $imageRepository): Response
    {
        return $this->render('themes/' . $this->getParameter('app.theme') . '/album/index.html.twig', [
            'albums' => $this->albumRepository->findAllWithFirstImage(),
            'image' => $imageRepository->findRandomOne(),
        ]);
    }

    #[Route('/album/{slug}', name: 'app_album_show')]
    public function show(string $slug): Response
    {
        $album = $this->albumRepository->findOneBySlug($slug);

        return $this->render('themes/' . $this->getParameter('app.theme') . '/album/show.html.twig', [
            'album' => $album,
        ]);
    }
}


