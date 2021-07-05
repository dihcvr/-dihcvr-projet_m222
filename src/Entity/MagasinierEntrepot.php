<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MagasinierEntrepot
 *
 * @ORM\Table(name="magasinier_entrepot", indexes={@ORM\Index(name="ENTREPOT_ID", columns={"ENTREPOT_ID"})})
 * @ORM\Entity
 */
class MagasinierEntrepot
{
    /**
     * @var int
     *
     * @ORM\Column(name="ENTREPOT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entrepotId;

    /**
     * @var int
     *
     * @ORM\Column(name="UTILISATEUR_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $utilisateurId;

    public function getEntrepotId(): ?int
    {
        return $this->entrepotId;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateurId;
    }


}
