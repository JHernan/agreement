<?php


namespace App\Form;

use App\Entity\Alimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AlimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alimony', CheckboxType::class, [
                'label' => ' ',
                'data' => true,
                'required' => false
            ])
            ->add('debtor', ChoiceType::class, [
                'choices'  => [
                    Alimony::DEBTOR_CHOICES_LABELS[0] => Alimony::DEBTOR_CHOICES_VALUES[0],
                    Alimony::DEBTOR_CHOICES_LABELS[1] => Alimony::DEBTOR_CHOICES_VALUES[1],
                ],
                'placeholder' => 'Seleccione un cónyuge',
                'label' => 'Cónyuge que abonará la pensión',
            ])
            ->add('creditor', null, [
                'attr' => array(
                    'readonly' => true,
                ),
                'label' => 'Cónyuge que recibirá la pensión',
            ])
            ->add('amount', MoneyType::class, [
                'label' => 'Importe de pensión'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alimony::class,
        ]);
    }
}