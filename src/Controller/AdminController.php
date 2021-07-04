<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/adin", name="admin")
     */
    
    public function index(): Response
    {
        return $this->render('admin/Dashboard.html.twig');
    }
     
    /**
     * @Route("/loin", name="login")
     */
    
    public function login(): Response
    {
        return $this->render('login/login.html.twig');
    }

    /**
     * @Route("/gerants", name="gerants")
     */
    
    public function gerants(): Response
    {
        return $this->render('admin/gerants.html.twig');
    }

    /**
     * @Route("/vendeurs", name="vendeurs")
     */
    
    public function vendeurs(): Response
    {
        return $this->render('admin/vendeurs.html.twig');
    }

     /**
     * @Route("/magasiniers", name="magasiniers")
     */
    
    public function magasiniers(): Response
    {
        return $this->render('admin/magasiniers.html.twig');
    }

     /**
     * @Route("/livraisons", name="livraisons")
     */
    
    public function livraisons(): Response
    {
        return $this->render('admin/livraisons.html.twig');
    }



    
}


