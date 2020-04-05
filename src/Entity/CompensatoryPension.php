<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class CompensatoryPension
{
    const CREDITOR_CHOICES_LABELS = ['Cónyuge 1', 'Cónyuge 2'];
    const CREDITOR_CHOICES_VALUES = [1, 2];
    const TERM_TIME_CHOICES_LABELS = ['Meses', 'Años'];
    const TERM_TIME_CHOICES_VALUES = [1, 2];

    /**
     * @Assert\Type("bool")
     */
    private $is_pension;

    /**
     * @Assert\NotBlank(groups={"pension"})
     */
    private $creditor;

    /**
     * @Assert\NotBlank(groups={"pension"})
     * @Assert\Type("int")
     */
    private $amount;

    /**
     * @Assert\Type("bool")
     */
    private $has_limit;

    /**
     * @Assert\NotBlank(groups={"term"})
     * @Assert\Type("int")
     * @Assert\GreaterThan(0)
     */
    private $term;

    /**
     * @Assert\NotBlank(groups={"term"})
     * @Assert\Choice(choices=CompensatoryPension::TERM_TIME_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $term_time;

    public function getIsPension()
    {
        return $this->is_pension;
    }

    public function setIsPension($is_pension)
    {
        $this->is_pension = $is_pension;
        return $this;
    }

    public function getCreditor()
    {
        return $this->creditor;
    }

    public function setCreditor($creditor)
    {
        $this->creditor = $creditor;
        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getHasLimit()
    {
        return $this->has_limit;
    }

    public function setHasLimit($has_limit)
    {
        $this->has_limit = $has_limit;
        return $this;
    }

    public function getTerm()
    {
        return $this->term;
    }

    public function setTerm($term)
    {
        $this->term = $term;
        return $this;
    }

    public function getTermTime()
    {
        return $this->term_time;
    }

    public function setTermTime($term_time)
    {
        $this->term_time = $term_time;
        return $this;
    }
}