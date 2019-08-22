<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\PartnerRepository")
 */
class Partner
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $dni;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $town;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Marriage", mappedBy="partner_first")
     */
    private $marriages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Agreement", mappedBy="partner")
     */
    private $agreements;

    public function __construct()
    {
        $this->marriages = new ArrayCollection();
        $this->agreements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
