<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $manager): Response
    {
        $genres =$manager->getRepository(Genre::class)->findAll();
        return $this->render('home/index.html.twig', [
            'Genres' => $genres,

        ]);
    }
    #[route('/Genres/{id}', name: 'Genres')]
    public function showCategories(MovieRepository $movieRepository, Genre $genre): Response
    {
        $movies = $movieRepository->findBy(['genre'=>$genre]);
    return $this->render('home/movie.html.twig',[
        'movies' => $movies,
//        dd($movieName)
    ]);
    }
}
