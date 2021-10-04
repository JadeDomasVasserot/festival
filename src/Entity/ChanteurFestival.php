<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChanteurFestival
 *
 * @ORM\Table(name="chanteur_festival", indexes={@ORM\Index(name="IdChanteurFk_ChanteurFestival", columns={"idChanteur"}), @ORM\Index(name="IdFestivalFk_ChanteurFestival", columns={"idFestival"})})
 * @ORM\Entity
 */
class ChanteurFestival
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
     * @var \Chanteur
     *
     * @ORM\ManyToOne(targetEntity="Chanteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChanteur", referencedColumnName="id")
     * })
     */
    private $idchanteur;

    /**
     * @var \Festival
     *
     * @ORM\ManyToOne(targetEntity="Festival")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFestival", referencedColumnName="id")
     * })
     */
    private $idfestival;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdchanteur(): ?Chanteur
    {
        return $this->idchanteur;
    }

    public function setIdchanteur(?Chanteur $idchanteur): self
    {
        $this->idchanteur = $idchanteur;

        return $this;
    }

    public function getIdfestival(): ?Festival
    {
        return $this->idfestival;
    }

    public function setIdfestival(?Festival $idfestival): self
    {
        $this->idfestival = $idfestival;

        return $this;
    }


}
