<?php

namespace App\Controller;

use App\Repository\PeintureRepository;
use App\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(PeintureRepository $peintureRepository, BlogpostRepository $blogpostRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'peintures' => $peintureRepository->lastTree(),
            'blogposts' => $blogpostRepository->lastTree(),
        ]);
    }
}
