<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/site", name="index")
     */
    public function index(): Response
    {
        $repoB = $this-> getDoctrine()->getRepository(Book::class);
        $repoF = $this-> getDoctrine()->getRepository(Film::class);
        $books = $repoB-> findAll();
        $films = $repoF-> findAll();
        $i = 1;
        $filmsP1 = array();
        $filmsP2 = array();
        /*
        foreach ($repoF-> findAll() as $film) {
            if ($i%2 == 1) {
                $filmsP1[$i] = $film;
            }
            elseif ($i%2 == 0) {
                $filmsP2[$i] = $film;
            }
            $i++;
        }
*/
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'books' => $books,
            //'filmsP1' => $filmsP1,
            //'filmsP2' => $filmsP2
            'films' => $films
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('site/home.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }
    /**
     * @Route("/site/film{id}", name="show_critique_film")
     */
    public function film($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Film::class);
        $film = $repo->find($id);
        $note = 0;
        foreach ($film->getNotes() as $value) {
            $note = $note+$value->getValue();
        }
        $note = intval($note/count($film->getNotes()));


        return $this->render('site/film.html.twig', [
            'controller_name' => 'SiteController',
            'film' => $film,
            'note' => $note
        ]);
    }
}
