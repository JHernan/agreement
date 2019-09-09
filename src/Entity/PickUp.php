<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class PickUp
{
    private $name;

    private $agreements;

    public function __construct()
    {
        $this->agreements = new ArrayCollection();
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
     * @return Collection|Agreement[]
     */
    public function getAgreements(): Collection
    {
        return $this->agreements;
    }

    public function addAgreement(Agreement $agreement): self
    {
        if (!$this->agreements->contains($agreement)) {
            $this->agreements[] = $agreement;
            $agreement->setPickUp($this);
        }

        return $this;
    }

    public function removeAgreement(Agreement $agreement): self
    {
        if ($this->agreements->contains($agreement)) {
            $this->agreements->removeElement($agreement);
            // set the owning side to null (unless already changed)
            if ($agreement->getPickUp() === $this) {
                $agreement->setPickUp(null);
            }
        }

        return $this;
    }
}
