<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Alimony
{
    const DEBTOR_CHOICES_LABELS = ['Cónyuge 1', 'Cónyuge 2'];
    const DEBTOR_CHOICES_VALUES = [1, 2];
    const CREDITOR_CHOICES_LABELS = ['Cónyuge 1', 'Cónyuge 2'];
    const CREDITOR_CHOICES_VALUES = [1, 2];

    /**
     * @Assert\Type("bool")
     */
    private $alimony;

    /**
     * @Assert\Choice(choices=Alimony::DEBTOR_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $debtor;

    /**
     * @Assert\Choice(choices=Alimony::CREDITOR_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $creditor;

    /**
     * @Assert\Type("int")
     */
    private $amount;


    public function getAlimony(): ?bool
    {
        return $this->alimony;
    }

    public function setAlimony(?bool $alimony): self
    {
        $this->alimony = $alimony;

        return $this;
    }

    public function getDebtor(): ?int
    {
        return $this->debtor;
    }

    public function setDebtor(?int $debtor): self
    {
        $this->debtor = $debtor;

        return $this;
    }

    public function getCreditor(): ?int
    {
        return $this->creditor;
    }

    public function setCreditor(?int $creditor): self
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
}