<?php

// src/Controller/MarqueController.php

namespace App\Controller;

use App\Entity\Marque;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route; // Importer la bonne classe pour les attributs

class MarqueController extends AbstractController
{
    #[Route('/marques', name: 'marque_index')]
    public function index()
    {
        // Logique pour afficher toutes les marques
    }

    #[Route('/marque/new', name: 'marque_new')]
    public function new(Request $request)
    {
        // Logique pour ajouter une nouvelle marque
    }

    #[Route('/marque/{id}/edit', name: 'marque_edit')]
    public function edit(Marque $marque, Request $request)
    {
        // Logique pour modifier une marque
    }

    #[Route('/marque/{id}/delete', name: 'marque_delete')]
    public function delete(Marque $marque)
    {
        // Logique pour supprimer une marque
    }
}
