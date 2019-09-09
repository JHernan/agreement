<?php

namespace App\Entity;

class Agreement
{
    private $custody;

    private $pick_up;

    private $alternate_weeks;

    private $partner;

    private $request;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustody()
    {
        return $this->custody;
    }

    public function setCustody(string $custody): self
    {
        $this->custody = $custody;

        return $this;
    }

    public function getPickUp()
    {
        return $this->pick_up;
    }

    public function setPickUp(string $pick_up): self
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
