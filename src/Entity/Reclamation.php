<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="detailRec", columns={"id_detailRec"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rec", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRec;

    /**
     * @var int
     *
     * @ORM\Column(name="idCde", type="integer", nullable=false)
     */
    private $idcde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rec", type="date", nullable=false)
     */
    private $dateRec;

    /**
     * @var string
     *
     * @ORM\Column(name="motif_rec", type="string", length=30, nullable=false)
     */
    private $motifRec;

    /**
     * @var int
     *
     * @ORM\Column(name="id_magasinier", type="integer", nullable=false)
     */
    private $idMagasinier;

    /**
     * @var \DetailReclamation
     *
     * @ORM\ManyToOne(targetEntity="DetailReclamation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_detailRec", referencedColumnName="id_detailRec")
     * })
     */
    private $idDetailrec;

    public function getIdRec(): ?int
    {
        return $this->idRec;
    }

    public function getIdcde(): ?int
    {
        return $this->idcde;
    }

    public function setIdcde(int $idcde): self
    {
        $this->idcde = $idcde;

        return $this;
    }

    public function getDateRec(): ?\DateTimeInterface
    {
        return $this->dateRec;
    }

    public function setDateRec(\DateTimeInterface $dateRec): self
    {
        $this->dateRec = $dateRec;

        return $this;
    }

    public function getMotifRec(): ?string
    {
        return $this->motifRec;
    }

    public function setMotifRec(string $motifRec): self
    {
        $this->motifRec = $motifRec;

        return $this;
    }

    public function getIdMagasinier(): ?int
    {
        return $this->idMagasinier;
    }

    public function setIdMagasinier(int $idMagasinier): self
    {
        $this->idMagasinier = $idMagasinier;

        return $this;
    }

    public function getIdDetailrec(): ?DetailReclamation
    {
        return $this->idDetailrec;
    }

    public function setIdDetailrec(?DetailReclamation $idDetailrec): self
    {
        $this->idDetailrec = $idDetailrec;

        return $this;
    }


}
