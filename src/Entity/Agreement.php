<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AgreementRepository")
 */
class Agreement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Custody", inversedBy="agreements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $custody;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PickUp", inversedBy="agreements")
     */
    private $pick_up;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $alternate_weeks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partner", inversedBy="agreements")
     */
    private $partner;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Request", inversedBy="agreement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $request;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustody(): ?Custody
    {
        return $this->custody;
    }

    public function setCustody(?Custody $custody): self
    {
        $this->custody = $custody;

        return $this;
    }

    public function getPickUp(): ?PickUp
    {
        return $this->pick_up;
    }

    public function setPickUp(?PickUp $pick_up): self
    {
        $this->pick_up = $pick_up;

        return $this;
    }

    public function getAlternateWeeks(): ?int
    {
        return $this->alternate_weeks;
    }

    public function setAlternateWeeks(?int $alternate_weeks): self
    {
        $this->alternate_weeks = $alternate_weeks;

        return $this;
    }

    public function getPartner(): ?Partner
    {
        return $this->partner;
    }

    public function setPartner(?Partner $partner): self
    {
        $this->partner = $partner;

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
}
