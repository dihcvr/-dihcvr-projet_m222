<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MagasinierController extends AbstractController
{
    /**
     * @Route("/magasinier", name="magasinier")
     */
    public function index(): Response
    {
        return $this->render('magasinier/index.html.twig', [
            'controller_name' => 'MagasinierController',
        ]);
    }
}
