<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EconomicSystemRepository")
 */
class EconomicSystem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Marriage", mappedBy="EconomicSystem")
     */
    private $marriages;

    public function __construct()
    {
        $this->marriages = new ArrayCollection();
    }

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

    /**
     * @return Collection|Marriage[]
     */
    public function getMarriages(): Collection
    {
        return $this->marriages;
    }

    public function addMarriage(Marriage $marriage): self
    {
        if (!$this->marriages->contains($marriage)) {
            $this->marriages[] = $marriage;
            $marriage->setEconomicSystem($this);
        }

        return $this;
    }

    public function removeMarriage(Marriage $marriage): self
    {
        if ($this->marriages->contains($marriage)) {
            $this->marriages->removeElement($marriage);
            // set the owning side to null (unless already changed)
            if ($marriage->getEconomicSystem() === $this) {
                $marriage->setEconomicSystem(null);
            }
        }

        return $this;
    }
}
