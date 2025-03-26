<?php

namespace App\Controller;

use App\Repository\VoituresRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(VoituresRepository $voituresRepository): Response
    {
        return $this->render('accueil/index.html.twig', [
            'voitures' => $voituresRepository->findAll(),
        ]);
    }
}
