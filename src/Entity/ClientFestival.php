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
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;

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

    public function getIdclient(): Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdfestival(): Festival
    {
        return $this->idfestival;
    }

    public function setIdfestival(?Festival $idfestival): self
    {
        $this->idfestival = $idfestival;

        return $this;
    }


}
