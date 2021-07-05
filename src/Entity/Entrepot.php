<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrepot
 *
 * @ORM\Table(name="entrepot")
 * @ORM\Entity
 */
class Entrepot
{
    /**
     * @var int
     *
     * @ORM\Column(name="ENTREPOT_ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $entrepotId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE_ENTREPOT", type="string", length=255, nullable=true)
     */
    private $adresseEntrepot;

    public function getEntrepotId(): ?int
    {
        return $this->entrepotId;
    }

    public function getAdresseEntrepot(): ?string
    {
        return $this->adresseEntrepot;
    }

    public function setAdresseEntrepot(?string $adresseEntrepot): self
    {
        $this->adresseEntrepot = $adresseEntrepot;

        return $this;
    }


}
