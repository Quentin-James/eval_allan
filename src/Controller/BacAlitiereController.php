<?php

namespace App\Controller;

use App\Entity\BacALitiere;
use App\Form\BacALitiereType;
use App\Repository\BacALitiereRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BacALitiereController extends AbstractController
{
    #[Route('/bacs', name: 'bac_index')]
    public function index(BacALitiereRepository $bacALitiereRepository): Response
    {
        return $this->render('bac_alitiere/index.html.twig', [
            'bacs' => $bacALitiereRepository->findAll(),
        ]);
    }

    #[Route('/bac/new', name: 'bac_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bac = new BacALitiere();
        $form = $this->createForm(BacALitiereType::class, $bac);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bac);
            $entityManager->flush();

            return $this->redirectToRoute('bac_index');
        }

        return $this->render('bac_alitiere/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/bac/{id}/edit', name: 'bac_edit')]
    public function edit(Request $request, BacALitiere $bac, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BacALitiereType::class, $bac);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('bac_index');
        }

        return $this->render('bac_alitiere/edit.html.twig', [
            'form' => $form->createView(),
            'bac' => $bac,
        ]);
    }

    #[Route('/bac/{id}/delete', name: 'bac_delete', methods: ['POST'])]
    public function delete(Request $request, BacALitiere $bac, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $bac->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bac);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bac_index');
    }
}