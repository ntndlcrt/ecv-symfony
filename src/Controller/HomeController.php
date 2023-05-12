<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /** 
     * @Route("/", name="app_home")
     */
    public function home(): Response
    {
        return new Response('hello world');
    }
}
