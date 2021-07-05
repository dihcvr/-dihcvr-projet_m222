<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailReclamation
 *
 * @ORM\Table(name="detail reclamation")
 * @ORM\Entity
 */
class DetailReclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_detailRec", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetailrec;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status;

    public function getIdDetailrec(): ?int
    {
        return $this->idDetailrec;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }


}
