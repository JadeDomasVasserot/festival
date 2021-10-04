<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chanson
 *
 * @ORM\Table(name="chanson")
 * @ORM\Entity
 */
class Chanson
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
     * @ORM\Column(name="nomChanson", type="text", length=65535, nullable=false)
     */
    private $nomchanson;

    /**
     * @var string
     *
     * @ORM\Column(name="nomAlbum", type="text", length=65535, nullable=false)
     */
    private $nomalbum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time", nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="text", length=65535, nullable=false)
     */
    private $genre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomchanson(): ?string
    {
        return $this->nomchanson;
    }

    public function setNomchanson(string $nomchanson): self
    {
        $this->nomchanson = $nomchanson;

        return $this;
    }

    public function getNomalbum(): ?string
    {
        return $this->nomalbum;
    }

    public function setNomalbum(string $nomalbum): self
    {
        $this->nomalbum = $nomalbum;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

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
    public function __toString()
    {
        return $this->id.'-'.$this->nomchanson;
    }

}
