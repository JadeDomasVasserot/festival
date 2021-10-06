<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientFestival
 *
 * @ORM\Table(name="client_festival", indexes={@ORM\Index(name="IdClientFk_ClientFestival", columns={"idClient"}), @ORM\Index(name="IdFestivalFk_ClientFestival", columns={"idFestival"})})
 * @ORM\Entity
 */
class ClientFestival
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
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     */
    private $idclient;

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

    public function getIdclient(): ?int
    {
        return $this->idclient;
    }

    public function setIdclient(?int $idclient): self
    {
        $this->idclient = $idclient;

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
