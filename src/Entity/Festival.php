<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Festival
 *
 * @ORM\Table(name="festival")
 * @ORM\Entity
 */
class Festival
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
     * @ORM\Column(name="nomFestival", type="text", length=65535, nullable=false)
     */
    private $nomfestival;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="datetime", nullable=false)
     */
    private $datedebut;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="text", length=65535, nullable=false)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="text", length=65535, nullable=false)
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="nbPlaces", type="integer", nullable=false)
     */
    private $nbplaces;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomfestival(): ?string
    {
        return $this->nomfestival;
    }

    public function setNomfestival(string $nomfestival): self
    {
        $this->nomfestival = $nomfestival;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;

        return $this;
    }
    public function __toString()
    {
        return $this->id.'-'.$this->nomfestival;
    }

}
