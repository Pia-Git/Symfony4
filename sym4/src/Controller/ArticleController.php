<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage() {
        return $this->render('article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
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
            'slug' => $slug,
            'comments' => $comments,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
    public function toggleArticleHeart($slug, LoggerInterface $logger) {

        //TODO - actually heart/unheart the article!

        $logger->info('Article is being hearted');

        //or $this->json(['hearts' => rand(5,100)]);
        return new JsonResponse(['hearts' => rand(5,100)]);

    }

}