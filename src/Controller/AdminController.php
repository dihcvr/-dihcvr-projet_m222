<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
                $utilisateur = $this->getUser();
                $nbr_gerant = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_GERANT'.'"%')
                        ->getQuery()
                        ->getResult();
                if(!$utilisateur)
                {
                        $session->set("message", "Merci de vous connecter");
                        return $this->redirectToRoute('app_login');
                }

                else if(in_array('ROLE_ADMIN', $utilisateur->getRoles())){
                        return $this->render('admin/Dashboard.html.twig', ['nbr_gerant' => count($nbr_gerant)]);
                }
                $session->set("message", "Vous n'avez pas le droit d'acceder à la page admin vous avez été redirigé sur cette page");
                if($session->has('message'))
                {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }

                return $this->render('admin/Dashboard.html.twig', ['user' => $utilisateur, 'nbr_gerant' => count($nbr_gerant)]);
    }

        /**
         * @Route("/gerants", name="gerants")
         */
        
        public function gerants(UtilisateurRepository $utilisateurRepository): Response
        {
                $role = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_GERANT'.'"%')
                        ->getQuery();
                return $this->render('admin/gerants.html.twig', ['utilisateurs' => $role->getResult()]);
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


