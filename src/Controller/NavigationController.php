<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class NavigationController extends AbstractController
{
        /**
         * @Route("/", name="home")
         */
        public function home(Session $session)
        {
                $return = [];

                if($session->has('message'))
                {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->redirectToRoute("app_login");
        }

        /**
         * @Route("/select_home", name="select_home")
         */
        public function select_home(Session $session)
        {
                $utilisateur = $this->getUser();
                if(in_array('ROLE_ADMIN', $utilisateur->getRoles())){
                        return $this->redirectToRoute('admin');
                }
                if(in_array('ROLE_GERANT', $utilisateur->getRoles())){
                        return $this->redirectToRoute('gerant');
                }
                if(in_array('ROLE_VENDEUR', $utilisateur->getRoles())){
                        return $this->redirectToRoute('vendeur');
                }
                if(in_array('ROLE_MAGASINIER', $utilisateur->getRoles())){
                        return $this->redirectToRoute('magasinier');
                }
                if(in_array('ROLE_LIVREUR', $utilisateur->getRoles())){
                        return $this->redirectToRoute('livreur');
                }
        }


        /**
         * @Route("/membre", name="membre")
         */
        public function membre(Session $session)
        {
                $return = [];

                if($session->has('message'))
                {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }
                return $this->render('navigation/membre.html.twig', $return);
        }

}