<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Agreement
{
    const CUSTODY_CHOICES = ['Compartida', 'Monoparental'];
    const CUSTODY_COMPARTIDA = self::CUSTODY_CHOICES[0];
    const CUSTODY_MONOPARENTAL = self::CUSTODY_CHOICES[1];
    const PICK_UP_CHOICES_LABELS = ['En el centro escolar', 'En el domicilio del progenitor no custodio'];
    const PICK_UP_CHOICES_VALUES = [1,  2];
    const PICK_UP_SCHOOL_CHOICES_LABELS = ['Los viernes a la finalización del horario escolar por el progenitor no custodio', 'Los lunes a la finalización del horario escolar por el progenitor no custodio'];
    const PICK_UP_SCHOOL_CHOICES_VALUES = [1, 2];
    const PICK_UP_HOME_CHOICES_LABELS = ['Los domingos en el domicilio del progenitor no custodio a una hora determinada', 'Los viernes en el domicilio del progenitor no custodio a una hora determinada'];
    const PICK_UP_HOME_CHOICES_VALUES = [1, 2];
    const PICK_UP_HOUR_CHOICES_LABELS = ['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
    const PICK_UP_HOUR_CHOICES_VALUES = ['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'];
    const SUMMER_PERIOD_CHOICES_LABELS = ['En periodos de dos semanas', 'En dos periodos iguales'];
    const SUMMER_PERIOD_CHOICES_VALUES = [1, 2];
    const PARTNER_CHOICES_LABELS = ['Cónyuge 1', 'Cónyuge 2'];
    const PARTNER_CHOICES_VALUES = [1, 2];

    /**
     * @Assert\NotBlank()
     */
    private $partner_home_use;

    /**
     * @Assert\NotBlank(groups={"children"})
     * @Assert\Choice(choices=Agreement::CUSTODY_CHOICES, message="Selecciona una opción válida.")
     */
    private $custody;

    /**
     * @Assert\NotBlank(groups={"compartida"})
     * @Assert\Choice(choices=Agreement::PICK_UP_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $pick_up;

    /**
     * @Assert\NotBlank(groups={"pick_up_school"})
     * @Assert\Choice(choices=Agreement::PICK_UP_SCHOOL_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $pick_up_school;

    /**
     * @Assert\NotBlank(groups={"pick_up_home"})
     * @Assert\Choice(choices=Agreement::PICK_UP_HOME_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $pick_up_home;

    /**
     * @Assert\NotBlank(groups={"pick_up_home"})
     * @Assert\Choice(choices=Agreement::PICK_UP_HOUR_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $pick_up_hour;

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

    /**
     * @Assert\Type(type="App\Entity\CompensatoryPension")
     * @Assert\Valid
     */
    private $compensatory_pension;


    public function getPartnerHomeUse()
    {
        return $this->partner_home_use;
    }

    public function setPartnerHomeUse($partner_home_use)
    {
        $this->partner_home_use = $partner_home_use;
        return $this;
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

    public function getPickUpSchool()
    {
        return $this->pick_up_school;
    }

    public function setPickUpSchool(string $pick_up_school): self
    {
        $this->pick_up_school = $pick_up_school;

        return $this;
    }

    public function getPickUpHome()
    {
        return $this->pick_up_home;
    }

    public function setPickUpHome(string $pick_up_home): self
    {
        $this->pick_up_home = $pick_up_home;

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

    public function getCompensatoryPension(): ?CompensatoryPension
    {
        return $this->compensatory_pension;
    }

    public function setCompensatoryPension(CompensatoryPension $compensatory_pension): self
    {
        $this->compensatory_pension = $compensatory_pension;

        return $this;
    }
}
