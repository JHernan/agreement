<?php

namespace App\Entity;

class Request
{
    private $request_type;

    private $marriage;

    private $town;

    private $date;

    private $agreement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestType(): ?string
    {
        return $this->request_type;
    }

    public function setRequestType(string $request_type): self
    {
        $this->request_type = $request_type;

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

    public function getAgreement(): ?Agreement
    {
        return $this->agreement;
    }

    public function setAgreement(Agreement $agreement): self
    {
        $this->agreement = $agreement;

        // set the owning side of the relation if necessary
        if ($this !== $agreement->getRequest()) {
            $agreement->setRequest($this);
        }

        return $this;
    }
}
