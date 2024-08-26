<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

    #[Route('/about', name: 'aboutpage')]
    public function about(): Response
    {
        return $this->render('index/about.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }

    #[Route('/zlist', name: 'zlistpage')]
    public function zlist(): Response
    {
        return $this->render('list/zlist.html.twig', [
            'controller_name' => 'ZlistController',
        ]);
    }
}