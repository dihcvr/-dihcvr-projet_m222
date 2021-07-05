<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_id_client", columns={"idCli"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCde", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_du_Commande", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateDuCommande;

    /**
     * @var bool
     *
     * @ORM\Column(name="paye", type="boolean", nullable=false)
     */
    private $paye = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCli", referencedColumnName="Id")
     * })
     */
    private $idcli;

    public function getIdcde(): ?int
    {
        return $this->idcde;
    }

    public function getDateDuCommande(): ?\DateTimeInterface
    {
        return $this->dateDuCommande;
    }

    public function setDateDuCommande(\DateTimeInterface $dateDuCommande): self
    {
        $this->dateDuCommande = $dateDuCommande;

        return $this;
    }

    public function getPaye(): ?bool
    {
        return $this->paye;
    }

    public function setPaye(bool $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getIdcli(): ?Client
    {
        return $this->idcli;
    }

    public function setIdcli(?Client $idcli): self
    {
        $this->idcli = $idcli;

        return $this;
    }
    public function __toString() {
        return $this->dateDuCommande;
    }

}
