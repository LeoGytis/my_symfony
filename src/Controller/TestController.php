<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test/{name}', name: 'app_test', defaults: ['name' => null], methods:['GET', 'HEAD'])]
    public function index($name): Response
    {
        // return $this->json([
        //     'msg' => 'Test Controller welcomes you ' . $name,
        // ]);
        $movies = ['Big Hunt', 'Loki', 'Black Mirror'];

        return $this->render('index.html.twig', [
            'controller_name' => 'TestController',
            'msg' => 'Hello,' . $name . 'How are you doing',
            'name' => $name,
            'movies' => $movies,
        ]);
    }
}
