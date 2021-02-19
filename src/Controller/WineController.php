<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WineController extends AbstractController
{
    /**
     * @Route("/wine", name="wine")
     */
    public function index(): Response
    {
        return $this->render('wine/index.html.twig', [
            'controller_name' => 'WineController',
        ]);
    }
}
