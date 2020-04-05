<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

class Partner
{
    const TITLE_LABELS = ['Don', 'Doña'];
    const TITLE_VALUES = [1, 2];

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(choices=Partner::TITLE_VALUES, message="Selecciona una opción válida.")
     */
    private $title;

    /**
     * @Assert\NotBlank()
     */
    private $dni;

    /**
     * @Assert\NotBlank()
     */
    private $first_name;

    /**
     * @Assert\NotBlank()
     */
    private $last_name;

    /**
     * @Assert\NotBlank()
     */
    private $nationality;

    /**
     * @Assert\NotBlank()
     */
    private $address;

    /**
     * @Assert\NotBlank()
     */
    private $town;

    private $marriages;

    private $agreements;


    public function __construct()
    {
        $this->marriages = new ArrayCollection();
        $this->agreements = new ArrayCollection();
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
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
            $marriage->setPartnerFirst($this);
        }

        return $this;
    }

    public function removeMarriage(Marriage $marriage): self
    {
        if ($this->marriages->contains($marriage)) {
            $this->marriages->removeElement($marriage);
            // set the owning side to null (unless already changed)
            if ($marriage->getPartnerFirst() === $this) {
                $marriage->setPartnerFirst(null);
            }
        }

        return $this;
    }

    public function toArray()
    {
        return [
            'dni' => $this->getDni()
        ];
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
            $agreement->setPartner($this);
        }

        return $this;
    }

    public function removeAgreement(Agreement $agreement): self
    {
        if ($this->agreements->contains($agreement)) {
            $this->agreements->removeElement($agreement);
            // set the owning side to null (unless already changed)
            if ($agreement->getPartner() === $this) {
                $agreement->setPartner(null);
            }
        }

        return $this;
    }
}
