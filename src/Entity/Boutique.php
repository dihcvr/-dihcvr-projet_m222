<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boutique
 *
 * @ORM\Table(name="boutique")
 * @ORM\Entity
 */
class Boutique
{
    /**
     * @var int
     *
     * @ORM\Column(name="BOUTIQUE_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $boutiqueId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOM_BOUTIQUE", type="string", length=255, nullable=true)
     */
    private $nomBoutique;

    public function getBoutiqueId(): ?int
    {
        return $this->boutiqueId;
    }

    public function getNomBoutique(): ?string
    {
        return $this->nomBoutique;
    }

    public function setNomBoutique(?string $nomBoutique): self
    {
        $this->nomBoutique = $nomBoutique;

        return $this;
    }


}
