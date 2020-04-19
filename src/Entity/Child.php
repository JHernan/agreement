<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Child
{
    /**
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @Assert\DateTime(format="dd/mm/yyyy")
     * @Assert\LessThan(propertyPath="marriage.request.date", message = "La fecha debe ser anterior a la fecha de realización del convenio")
     */
    private $date;

    /**
     * @Assert\NotBlank
     */
    private $registry;

    /**
     * @Assert\NotBlank
     * @Assert\GreaterThan(0)
     */
    private $volume;

    /**
     * @Assert\NotBlank
     * @Assert\GreaterThan(0)
     */
    private $page;

    /**
     * @Assert\Type(type="App\Entity\Marriage")
     * @Assert\Valid
     */
    private $marriage;


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getMarriage(): ?Marriage
    {
        return $this->marriage;
    }

    public function setMarriage(?Marriage $marriage): self
    {
        $this->marriage = $marriage;

        return $this;
    }

    public function getRegistry(): ?string
    {
        return $this->registry;
    }

    public function setRegistry(string $registry): self
    {
        $this->registry = $registry;

        return $this;
    }

    public function getVolume(): ?string
    {
        return $this->volume;
    }

    public function setVolume(string $volume): self
    {
        $this->volume = $volume;

        return $this;
    }

    public function getPage(): ?string
    {
        return $this->page;
    }

    public function setPage(string $page): self
    {
        $this->page = $page;

        return $this;
    }
}
