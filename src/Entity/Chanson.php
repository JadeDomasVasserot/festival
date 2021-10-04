<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chanson
 *
 * @ORM\Table(name="chanson", indexes={@ORM\Index(name="IdChanteurFk_Chanson", columns={"id_chanteur"})})
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
     * @ORM\Column(name="nom_chanson", type="text", length=65535, nullable=false)
     */
    private $nomChanson;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_album", type="text", length=65535, nullable=false)
     */
    private $nomAlbum;

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

    /**
     * @var \Chanteur
     *
     * @ORM\ManyToOne(targetEntity="Chanteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_chanteur", referencedColumnName="id")
     * })
     */
    private $idChanteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChanson(): ?string
    {
        return $this->nomChanson;
    }

    public function setNomChanson(string $nomChanson): self
    {
        $this->nomChanson = $nomChanson;

        return $this;
    }

    public function getNomAlbum(): ?string
    {
        return $this->nomAlbum;
    }

    public function setNomAlbum(string $nomAlbum): self
    {
        $this->nomAlbum = $nomAlbum;

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

    public function getIdChanteur(): ?Chanteur
    {
        return $this->idChanteur;
    }

    public function setIdChanteur(?Chanteur $idChanteur): self
    {
        $this->idChanteur = $idChanteur;

        return $this;
    }


}
