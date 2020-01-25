<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Agreement
{
    const CUSTODY_CHOICES = ['Compartida', 'Monoparental'];
    const CUSTODY_COMPARTIDA = self::CUSTODY_CHOICES[0];
    const CUSTODY_MONOPARENTAL = self::CUSTODY_CHOICES[1];
    const PICK_UP_CHOICES_LABELS = ['El centro escolar el viernes, a la finalización del horario lectivo', 'El domicilio del otro progenitor el viernes a una hora determinada'];
    const PICK_UP_CHOICES_VALUES = [1 ,2];
    const DELIVERY_CHOICES_LABELS = ['El centro escolar el lunes, al comienzo del horario lectivo', 'El domicilio del otro progenitor el domingo a una hora determinada'];
    const DELIVERY_CHOICES_VALUES = [1, 2];
    const SUMMER_PERIOD_CHOICES_LABELS = ['En periodos de dos semanas', 'En dos periodos iguales'];
    const SUMMER_PERIOD_CHOICES_VALUES = [1, 2];
    const PARTNER_CHOICES_LABELS = ['Cónyuge 1', 'Cónyuge 2'];
    const PARTNER_CHOICES_VALUES = [1, 2];

    /**
     * @Assert\NotBlank()
     * @Assert\Choice(choices=Agreement::CUSTODY_CHOICES, message="Selecciona una opción válida.")
     */
    private $custody;

    /**
     * @Assert\NotBlank(groups={"compartida"})
     * @Assert\Choice(choices=Agreement::PICK_UP_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $pick_up;

    private $pick_up_hour;

    /**
     * @Assert\NotBlank(groups={"compartida"})
     * @Assert\Choice(choices=Agreement::DELIVERY_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $delivery;

    private $delivery_hour;

    /**
     * @Assert\NotBlank(groups={"compartida"})
     * @Assert\Type(
     *     type="integer",
     *     message="El valor {{ value }} no es un número válido.",
     *     groups={"compartida"}
     * )
     * @Assert\GreaterThan(
     *     value = 0,
     *     groups={"compartida"}
     * )
     */
    private $alternate_weeks;

    /**
     * @Assert\NotBlank(groups={"compartida"})
     * @Assert\Choice(choices=Agreement::SUMMER_PERIOD_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $summer_period;

    /**
     * @Assert\NotBlank(groups={"monoparental"})
     * @Assert\Choice(choices=Agreement::PARTNER_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $partner;

    /**
     * @Assert\Type(type="App\Entity\Request")
     * @Assert\Valid
     */
    private $request;

    /**
     * @Assert\Type(type="App\Entity\Alimony")
     * @Assert\Valid
     */
    private $alimony;


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

    public function getDeliveryText(){
        return self::DELIVERY_CHOICES_LABELS[$this->delivery];
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

    public function getSummerPeriod()
    {
        return $this->summer_period;
    }

    public function setSummerPeriod(string $summer_period): self
    {
        $this->summer_period = $summer_period;

        return $this;
    }

    public function getPartner(): ?int
    {
        return $this->partner;
    }

    public function setPartner(?int $partner): self
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

    public function getAlimony(): ?Alimony
    {
        return $this->alimony;
    }

    public function setAlimony(Alimony $alimony): self
    {
        $this->alimony = $alimony;

        return $this;
    }
}
