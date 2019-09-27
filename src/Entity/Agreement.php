<?php

namespace App\Entity;

class Agreement
{
    private $custody;

    private $pick_up;

    private $pick_up_hour;

    private $delivery;

    private $delivery_hour;

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

    public function getPickUpHour()
    {
        return $this->pick_up_hour;
    }

    public function setPickUpHour(string $pick_up_hour): self
    {
        $this->pick_up_hour = $pick_up_hour;

        return $this;
    }

    public function getDelivery()
    {
        return $this->delivery;
    }

    public function setDelivery(string $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getDeliveryHour()
    {
        return $this->delivery_hour;
    }

    public function setDeliveryHour(string $delivery_hour): self
    {
        $this->delivery_hour = $delivery_hour;

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
