<?php
// src/Controller/HomeController.php
namespace App\Controller;

use App\Repository\BacALitiereRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BacALitiereRepository $bacALitiereRepository)
    {
        $bacs = $bacALitiereRepository->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'bacs' => $bacs,  // Pass the bacs variable to the template
        ]);
    }
}