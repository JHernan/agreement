<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Request
{
    const REQUEST_TYPE = ['Divorcio', 'Separación'];

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(choices=Request::REQUEST_TYPE, message="Selecciona una opción válida.")
     */
    private $request_type;

    /**
     * @Assert\Type(type="App\Entity\Marriage")
     * @Assert\Valid
     */
    private $marriage;

    /**
     * @Assert\NotBlank()
     */
    private $town;

    /**
     * @Assert\DateTime(format="dd/mm/yyyy")
     */
    private $date;

    /**
     * @Assert\Type(type="App\Entity\Agreement")
     * @Assert\Valid
     */
    private $agreement;


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
