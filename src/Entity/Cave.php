<?php

namespace App\Entity;

use App\Repository\CaveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaveRepository::class)
 */
class Cave
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Wine::class, mappedBy="cave", orphanRemoval=true)
     */
    private $Wines;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="caves")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    public function __construct()
    {
        $this->Wines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Wine[]
     */
    public function getWines(): Collection
    {
        return $this->Wines;
    }

    public function addWine(Wine $wine): self
    {
        if (!$this->Wines->contains($wine)) {
            $this->Wines[] = $wine;
            $wine->setCave($this);
        }

        return $this;
    }

    public function removeWine(Wine $wine): self
    {
        if ($this->Wines->removeElement($wine)) {
            // set the owning side to null (unless already changed)
            if ($wine->getCave() === $this) {
                $wine->setCave(null);
            }
        }

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
