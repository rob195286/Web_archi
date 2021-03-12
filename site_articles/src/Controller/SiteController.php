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
        $i = 1;
        $filmsP1 = array();
        $filmsP2 = array();
        foreach ($repoF-> findAll() as $value=>$film) {
            if ($value%2 == 0) {
            //if ($i%2 == 0) {
                $filmsP1[$value] = $film;
            }
            elseif ($value%2 == 1) {
            //elseif ($i%2 == 1) {
                $filmsP2[$value] = $film;
            }
            $i++;
        }

        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'books' => $books,
            'films' => $filmsP1
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
     * @Route("/site/article", name="show_article")
     */
    public function article(): Response
    {
        return $this->render('site/article.html.twig', [
            'controller_name' => 'SiteController',
        ]);
    }
}
