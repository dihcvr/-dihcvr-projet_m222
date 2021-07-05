<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_du_client", type="string", length=11, nullable=false)
     */
    private $nomDuClient;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_du_Client", type="string", length=11, nullable=false)
     */
    private $prenomDuClient;

    /**
     * @var string
     *
     * @ORM\Column(name="telCli", type="string", length=11, nullable=false)
     */
    private $telcli;

    /**
     * @var string
     *
     * @ORM\Column(name="adrCli", type="string", length=11, nullable=false)
     */
    private $adrcli;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDuClient(): ?string
    {
        return $this->nomDuClient;
    }

    public function setNomDuClient(string $nomDuClient): self
    {
        $this->nomDuClient = $nomDuClient;

        return $this;
    }

    public function getPrenomDuClient(): ?string
    {
        return $this->prenomDuClient;
    }

    public function setPrenomDuClient(string $prenomDuClient): self
    {
        $this->prenomDuClient = $prenomDuClient;

        return $this;
    }

    public function getTelcli(): ?string
    {
        return $this->telcli;
    }

    public function setTelcli(string $telcli): self
    {
        $this->telcli = $telcli;

        return $this;
    }

    public function getAdrcli(): ?string
    {
        return $this->adrcli;
    }

    public function setAdrcli(string $adrcli): self
    {
        $this->adrcli = $adrcli;

        return $this;
    }

    public function __toString() {
        return $this->nomDuClient.' '.$this->prenomDuClient;
    }
}
