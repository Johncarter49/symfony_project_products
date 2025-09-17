<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function index():Response
    {

        // html.twig kullanimi 
        
        // $contens = $this->renderView('home/index.html.twig');
        // return new Response($contens);
        
        // daha kolay yöntemi

        return $this->render('home/index.html.twig');

        // normal controller kullanimi 

        // return new Response('Hello from Home Controller');
        // return new Response('<h1>Hello from Home Controller</h1>');
    }    
}