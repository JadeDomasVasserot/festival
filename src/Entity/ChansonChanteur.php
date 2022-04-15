<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ChansonChanteur
 *
 * @ORM\Table(name="chanson_chanteur", indexes={@ORM\Index(name="IdChansonFk_ChansonChanteur", columns={"idChanson"}), @ORM\Index(name="IdChanteurFk_ChansonChanteur", columns={"idChanteur"})})
 * @ORM\Entity
 */
class ChansonChanteur
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
     * @var \Chanson
     *
     * @ORM\ManyToOne(targetEntity="Chanson",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChanson", referencedColumnName="id")
     * })
     */
    private $idchanson;

    /**
     * @var \Chanteur
     *
     * @ORM\ManyToOne(targetEntity="Chanteur",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChanteur", referencedColumnName="id")
     * })
     */
    private $idchanteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdchanson(): ?Chanson
    {
        return $this->idchanson;
    }

    public function setIdchanson(?Chanson $idchanson): self
    {
        $this->idchanson = $idchanson;

        return $this;
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


}
