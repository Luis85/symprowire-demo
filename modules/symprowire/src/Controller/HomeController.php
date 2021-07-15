<?php

namespace App\Controller;


use Symprowire\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     *
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {
        $blogPosts = $this->pages->find('template=BlogPost');

        return $this->render('home/index.html.twig', [
            'title' => 'My new Symprowire Blog - powered by ProcessWire',
            'posts' => $blogPosts,
        ]);
    }

}
