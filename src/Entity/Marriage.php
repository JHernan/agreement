<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;


class Marriage
{
    const MARRIAGE_TYPE_CHOICES = ['Canónico', 'Civil'];
    const ECONOMIC_SYSTEM_CHOICES = ['Sociedad de gananciales', 'Separación de bienes'];

    /**
     * @Assert\NotBlank
     */
    private $town;

    /**
     * @Assert\DateTime(format="dd/mm/yyyy")
     * @Assert\LessThan(propertyPath="request.date", message = "La fecha debe ser anterior a la fecha de realización del convenio")
     */
    private $date;

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(choices=Marriage::MARRIAGE_TYPE_CHOICES, message="Selecciona una opción válida.")
     */
    private $marriage_type;

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(choices=Marriage::ECONOMIC_SYSTEM_CHOICES, message="Selecciona una opción válida.")
     */
    private $economic_system;

    /**
     * @Assert\Type(type="App\Entity\Registry")
     * @Assert\Valid
     */
    private $registry;

    /**
     * @Assert\Type(type="App\Entity\Partner")
     * @Assert\Valid
     */
    private $partner_first;

    /**
     * @Assert\Type(type="App\Entity\Partner")
     * @Assert\Valid
     */
    private $partner_second;

    /**
     * @Assert\Type(type="App\Entity\House")
     * @Assert\Valid
     */
    private $house;

    /**
     * @Assert\Type(type="App\Entity\Request")
     */
    private $request;

    private $children;


    public function __construct()
    {
        $this->children = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMarriageType(): ?string
    {
        return $this->marriage_type;
    }

    public function setMarriageType(string $marriage_type): self
    {
        $this->marriage_type = $marriage_type;

        return $this;
    }

    public function getEconomicSystem(): ?string
    {
        return $this->economic_system;
    }

    public function setEconomicSystem(string $economic_system): self
    {
        $this->economic_system = $economic_system;

        return $this;
    }

    public function getRegistry(): ?Registry
    {
        return $this->registry;
    }

    public function setRegistry(?Registry $registry): self
    {
        $this->registry = $registry;

        return $this;
    }

    public function getPartnerFirst(): ?Partner
    {
        return $this->partner_first;
    }

    public function setPartnerFirst(?Partner $partner_first): self
    {
        $this->partner_first = $partner_first;

        return $this;
    }

    public function getPartnerSecond(): ?Partner
    {
        return $this->partner_second;
    }

    public function setPartnerSecond(?Partner $partner_second): self
    {
        $this->partner_second = $partner_second;

        return $this;
    }

    public function getHouse(): ?House
    {
        return $this->house;
    }

    public function setHouse(?House $house): self
    {
        $this->house = $house;

        return $this;
    }

    public function getRequest(): ?Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): self
    {
        $this->request = $request;

        return $this;
    }

    public function removeRequest(Request $request): self
    {
        if ($this->requests->contains($request)) {
            $this->requests->removeElement($request);
            // set the owning side to null (unless already changed)
            if ($request->getMarriage() === $this) {
                $request->setMarriage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(Child $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setMarriage($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getMarriage() === $this) {
                $child->setMarriage(null);
            }
        }

        return $this;
    }
}
