<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestRepository")
 */
class Request
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RequestType", inversedBy="requests")
     * @ORM\JoinColumn(nullable=true)
     */
    private $request_type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Marriage", inversedBy="request", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $marriage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $town;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Agreement", mappedBy="request", cascade={"persist", "remove"})
     */
    private $agreement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRequestType(): ?RequestType
    {
        return $this->request_type;
    }

    public function setRequestType(?RequestType $request_type): self
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
