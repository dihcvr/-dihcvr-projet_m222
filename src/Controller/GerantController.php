<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\UtilisateurRepository;

class GerantController extends AbstractController
{
    /**
     * @Route("/gerant", name="gerant")
     */
    
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
                $utilisateur = $this->getUser();
                
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

                else if(in_array('ROLE_GERANT', $utilisateur->getRoles())){
                        return $this->render('gerant/Dashboard.html.twig', 
                        [
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

                 return $this->render('gerant/Dashboard.html.twig', 
                        [
                                'nbr_magasinier' => count($nbr_magasinier),
                                'nbr_vendeur' => count($nbr_vendeur),
                                'nbr_livreur' => count($nbr_livreur)
                        ]);
    }

    /**
     * @Route("/clients", name="clients")
     */
    public function clients(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('client/clients.html.twig');

    }

    /**
     * @Route("/commandes", name="commandes")
     */
    public function commandes(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('gerant/commandes.html.twig');

    }
    
}
