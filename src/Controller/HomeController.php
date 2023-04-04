<?php

namespace App\Controller;

use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $manager): Response
    {
        $genres =$manager->getRepository(Genre::class)->findAll;
        return $this->render('home/index.html.twig', [
            'genres' => $genres,
        ]);
    }
    #[route('/genres{id}', name: 'genres')]
    public function showCategories(int $id): Response
    {
    dd($id);
    }
}
