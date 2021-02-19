<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WineController
 * @package App\Controller
 * @Route("/wine")
 */
class WineController extends AbstractController
{
    /**
     * @Route("/find", name="wine")
     */
    public function index(): Response
    {
        return $this->render('wine/index.html.twig', [
            'controller_name' => 'WineController',
        ]);
    }
}
