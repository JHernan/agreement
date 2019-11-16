<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;


class House
{
    /**
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @Assert\NotBlank
     */
    private $town;

    private $marriages;


    public function __construct()
    {
        $this->marriages = new ArrayCollection();
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

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
            $marriage->setHouse($this);
        }

        return $this;
    }

    public function removeMarriage(Marriage $marriage): self
    {
        if ($this->marriages->contains($marriage)) {
            $this->marriages->removeElement($marriage);
            // set the owning side to null (unless already changed)
            if ($marriage->getHouse() === $this) {
                $marriage->setHouse(null);
            }
        }

        return $this;
    }
}
