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
                $nbr_vendeur = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_VENDEUR'.'"%')
                        ->getQuery()
                        ->getResult();
                $nbr_magasinier = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_MAGASINIER'.'"%')
                        ->getQuery()
                        ->getResult();
                $nbr_livreur = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_LIVREUR'.'"%')
                        ->getQuery()
                        ->getResult();

                if(!$utilisateur)
                {
                        $session->set("message", "Merci de vous connecter");
                        return $this->redirectToRoute('app_login');
                }

                else if(in_array('ROLE_ADMIN', $utilisateur->getRoles())){
                        return $this->render('admin/Dashboard.html.twig', 
                        [
                                'nbr_gerant' => count($nbr_gerant),
                                'nbr_magasinier' => count($nbr_magasinier),
                                'nbr_vendeur' => count($nbr_vendeur),
                                'nbr_livreur' => count($nbr_livreur)
                        ]);
                }
                $session->set("message", "Vous n'avez pas le droit d'acceder à la page admin vous avez été redirigé sur cette page");
                if($session->has('message'))
                {
                        $message = $session->get('message');
                        $session->remove('message'); //on vide la variable message dans la session
                        $return['message'] = $message; //on ajoute à l'array de paramètres notre message
                }

                 return $this->render('admin/Dashboard.html.twig', 
                        [
                                'nbr_gerant' => count($nbr_gerant),
                                'nbr_magasinier' => count($nbr_magasinier),
                                'nbr_vendeur' => count($nbr_vendeur),
                                'nbr_livreur' => count($nbr_livreur)
                        ]);
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
        
        public function vendeurs(UtilisateurRepository $utilisateurRepository): Response
        {       
                $role = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_VENDEUR'.'"%')
                        ->getQuery();
                return $this->render('admin/vendeurs.html.twig', ['utilisateurs' => $role->getResult()]);
        }

        /**
         * @Route("/magasiniers", name="magasiniers")
         */
        
        public function magasiniers(UtilisateurRepository $utilisateurRepository): Response
        {
                $role = $utilisateurRepository->createQueryBuilder('u')
                        ->andWhere('u.roles LIKE :role')
                        ->setParameter('role', '%"'.'ROLE_MAGASINIER'.'"%')
                        ->getQuery();
                return $this->render('admin/magasiniers.html.twig', ['utilisateurs' => $role->getResult()]);
        }

    /**
     * @Route("/livraisons", name="livraisons")
     */
    
    public function livraisons(UtilisateurRepository $utilisateurRepository): Response
    {
        $role = $utilisateurRepository->createQueryBuilder('u')
        ->andWhere('u.roles LIKE :role')
        ->setParameter('role', '%"'.'ROLE_LIVREUR'.'"%')
        ->getQuery();
        return $this->render('admin/livraisons.html.twig', ['utilisateurs' => $role->getResult()]);
    }
}


