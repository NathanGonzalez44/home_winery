<?php

namespace App\Entity;

use App\Repository\WineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WineRepository::class)
 */
class Wine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $millesime;

    /**
     * @ORM\Column(type="date")
     */
    private $dateMiseEnCave;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $color;

    /**
     * @ORM\Column(type="date")
     */
    private $potentielDeGarde;

    /**
     * @ORM\ManyToOne(targetEntity=Cave::class, inversedBy="Wines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cave;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMillesime(): ?string
    {
        return $this->millesime;
    }

    public function setMillesime(string $millesime): self
    {
        $this->millesime = $millesime;

        return $this;
    }

    public function getDateMiseEnCave(): ?\DateTimeInterface
    {
        return $this->dateMiseEnCave;
    }

    public function setDateMiseEnCave(\DateTimeInterface $dateMiseEnCave): self
    {
        $this->dateMiseEnCave = $dateMiseEnCave;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPotentielDeGarde(): ?\DateTimeInterface
    {
        return $this->potentielDeGarde;
    }

    public function setPotentielDeGarde(\DateTimeInterface $potentielDeGarde): self
    {
        $this->potentielDeGarde = $potentielDeGarde;

        return $this;
    }

    public function getCave(): ?Cave
    {
        return $this->cave;
    }

    public function setCave(?Cave $cave): self
    {
        $this->cave = $cave;

        return $this;
    }
}
