<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvenementRepository;

class RassoController extends AbstractController
{
    #[Route('/rasso', name: 'app_rasso')]
    public function index(EvenementRepository $evenementRepository): Response
    {
        $events = $evenementRepository->findAll();

        return $this->render('rasso/index.html.twig', [
            'controller_name' => 'RassoController',
            'events' => $events,
        ]);
    }
}
