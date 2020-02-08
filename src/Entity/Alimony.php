<?php


namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;


class Alimony
{
    const DEBTOR_CHOICES_LABELS = ['Cónyuge 1', 'Cónyuge 2'];
    const DEBTOR_CHOICES_VALUES = [1, 2];

    /**
     * @Assert\Type("bool")
     */
    private $alimony;

    /**
     * @Assert\NotBlank(groups={"monoparental", "alimony"})
     * @Assert\Choice(choices=Alimony::DEBTOR_CHOICES_VALUES, message="Selecciona una opción válida.")
     */
    private $debtor;

    /**
     * @Assert\NotBlank(groups={"monoparental", "alimony"})
     */
    private $creditor;

    /**
     * @Assert\NotBlank(groups={"monoparental", "alimony"})
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

    public function getCreditor(): ?string
    {
        return $this->creditor;
    }

    public function setCreditor(?string $creditor): self
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