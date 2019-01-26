<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage() {
        return new Response("My first Symfony Page! Wooo!");
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug) {
        //return new Response(sprintf("Name of the Article: %s", $slug));
        $comments = [
            'Woowooo Bacon!',
            'I like Bacon too.',
            'Oh yeah, Bacon tastes good.',
        ];

        return $this->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments
        ]);
    }

}