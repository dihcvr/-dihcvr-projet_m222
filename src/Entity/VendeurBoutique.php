<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VendeurBoutique
 *
 * @ORM\Table(name="vendeur_boutique")
 * @ORM\Entity
 */
class VendeurBoutique
{
    /**
     * @var int
     *
     * @ORM\Column(name="BOUTIQUE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $boutiqueId;

    /**
     * @var int
     *
     * @ORM\Column(name="UTILISATEUR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $utilisateurId;

    public function getBoutiqueId(): ?int
    {
        return $this->boutiqueId;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateurId;
    }


}
