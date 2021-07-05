<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comandeline
 *
 * @ORM\Table(name="comandeline", indexes={@ORM\Index(name="fk_id_produit", columns={"idProd"}), @ORM\Index(name="fk_id_commande", columns={"idCde"})})
 * @ORM\Entity
 */
class Comandeline
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="Quantite", type="float", precision=10, scale=0, nullable=false)
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="Tracking Number", type="integer", nullable=false)
     */
    private $trackingNumber;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCde", referencedColumnName="idCde")
     * })
     */
    private $idcde;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProd", referencedColumnName="idProd")
     * })
     */
    private $idprod;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?float
    {
        return $this->quantite;
    }

    public function setQuantite(float $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getTrackingNumber(): ?int
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(int $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getIdcde(): ?Commande
    {
        return $this->idcde;
    }

    public function setIdcde(?Commande $idcde): self
    {
        $this->idcde = $idcde;

        return $this;
    }

    public function getIdprod(): ?Produit
    {
        return $this->idprod;
    }

    public function setIdprod(?Produit $idprod): self
    {
        $this->idprod = $idprod;

        return $this;
    }


}
