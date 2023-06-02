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
<<<<<<< HEAD
       return $this->render('base.html.twig', [
=======
        return $this->render('base.html.twig', [
>>>>>>> develop
            'name' => 'Yourkdo',
        ]);
    }
}
