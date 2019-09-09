<?php

namespace App\Entity;

class Child
{
    private $name;

    private $date;

    private $marriage;

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
