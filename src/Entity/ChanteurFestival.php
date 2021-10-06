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
     * @var int
     *
     * @ORM\Column(name="idChanteur", type="integer", nullable=false)
     */
    private $idchanteur;

    /**
     * @var int
     * 
     * @ORM\Column(name="idFestival", type="integer", nullable=false)
     */
    private $idfestival;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdchanteur(): ?int
    {
        return $this->idchanteur;
    }

    public function setIdchanteur(?int $idchanteur): self
    {
        $this->idchanteur = $idchanteur;

        return $this;
    }

    public function getIdfestival(): ?int
    {
        return $this->idfestival;
    }

    public function setIdfestival(?int $idfestival): self
    {
        $this->idfestival = $idfestival;

        return $this;
    }


}
