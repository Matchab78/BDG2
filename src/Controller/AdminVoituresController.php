<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Form\VoituresType;
use App\Repository\VoituresRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/voitures')]
class AdminVoituresController extends AbstractController
{
    #[Route('/', name: 'app_admin_voitures_index', methods: ['GET'])]
    public function index(VoituresRepository $voituresRepository): Response
    {
        return $this->render('admin_voitures/index.html.twig', [
            'voitures' => $voituresRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_voitures_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VoituresRepository $voituresRepository): Response
    {
        $voiture = new Voitures();
        $form = $this->createForm(VoituresType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voituresRepository->add($voiture, true);

            return $this->redirectToRoute('app_admin_voitures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_voitures/new.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_voitures_show', methods: ['GET'])]
    public function show(Voitures $voiture): Response
    {
        return $this->render('admin_voitures/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_voitures_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Voitures $voiture, VoituresRepository $voituresRepository): Response
    {
        $form = $this->createForm(VoituresType::class, $voiture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $voituresRepository->add($voiture, true);

            return $this->redirectToRoute('app_admin_voitures_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_voitures/edit.html.twig', [
            'voiture' => $voiture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_voitures_delete', methods: ['POST'])]
    public function delete(Request $request, Voitures $voiture, VoituresRepository $voituresRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            $voituresRepository->remove($voiture, true);
        }

        return $this->redirectToRoute('app_admin_voitures_index', [], Response::HTTP_SEE_OTHER);
    }
}
