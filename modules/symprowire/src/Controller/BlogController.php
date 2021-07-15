<?php

namespace App\Controller;

use ProcessWire\Wire404Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symprowire\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/blog/{slug}", methods="GET", name="blog_post")
     */
    public function postShow(string $slug): Response
    {
        $post = $this->pages->get('name='.$slug);

        if(!$post->id) throw new Wire404Exception('Blog Post not found');

        return $this->render('blog/post_show.html.twig', [
            'title' => $post->title,
            'body' => $post->body,
        ]);
    }
}
