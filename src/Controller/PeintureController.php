<?php

namespace App\Controller;

use App\Repository\PeintureRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 

class PeintureController extends AbstractController
{
    #[Route('/realisations', name: 'app_realisations')]
    public function realisations(
        PeintureRepository $peintureRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response{
        $data = $peintureRepository->findAll();

        $peintures = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1), /* page number */
            6 /* limit per page */
        );

        return $this->render('peinture/realisations.html.twig', [
            // Avant Paginator.
            //'peintures' => $peintureRepository->findAll(),

            // Après.
            'peintures' => $peintures,
        ]);
    }
}
