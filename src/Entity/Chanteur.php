<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chanteur
 *
 * @ORM\Table(name="chanteur")
 * @ORM\Entity
 */
class Chanteur
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
     * @var string
     *
     * @ORM\Column(name="nomScene", type="text", length=65535, nullable=false)
     */
    private $nomscene;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="text", length=65535, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="text", length=65535, nullable=false)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=false)
     */
    private $datenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="text", length=65535, nullable=false)
     */
    private $sexe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomscene(): ?string
    {
        return $this->nomscene;
    }

    public function setNomscene(string $nomscene): self
    {
        $this->nomscene = $nomscene;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }
    public function __toString()
    {
        return $this->id.'-'.$this->nomscene;
    }

}
