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
     */
    private $date;

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
}
