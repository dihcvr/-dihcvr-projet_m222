<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="fk_id_detailliv", columns={"id_detailliv"}), @ORM\Index(name="fk_id_commandee", columns={"id_commande"})})
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_liv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLiv;

    /**
     * @var int
     *
     * @ORM\Column(name="id_vendeur", type="integer", nullable=false)
     */
    private $idVendeur;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=30, nullable=false)
     */
    private $date;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commande", referencedColumnName="idCde")
     * })
     */
    private $idCommande;

    /**
     * @var \DetailLivraison
     *
     * @ORM\ManyToOne(targetEntity="DetailLivraison")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_detailliv", referencedColumnName="id")
     * })
     */
    private $idDetailliv;

    public function getIdLiv(): ?int
    {
        return $this->idLiv;
    }

    public function getIdVendeur(): ?int
    {
        return $this->idVendeur;
    }

    public function setIdVendeur(int $idVendeur): self
    {
        $this->idVendeur = $idVendeur;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->idCommande;
    }

    public function setIdCommande(?Commande $idCommande): self
    {
        $this->idCommande = $idCommande;

        return $this;
    }

    public function getIdDetailliv(): ?DetailLivraison
    {
        return $this->idDetailliv;
    }

    public function setIdDetailliv(?DetailLivraison $idDetailliv): self
    {
        $this->idDetailliv = $idDetailliv;

        return $this;
    }


}
