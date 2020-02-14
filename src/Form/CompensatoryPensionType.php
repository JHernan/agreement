<?php

namespace App\Form;

use App\Entity\CompensatoryPension;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompensatoryPensionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isPension', CheckboxType::class, [
                'label' => ' ',
                'data' => true,
                'required' => false
            ])
            ->add('creditor', ChoiceType::class, [
                'choices'  => [
                    CompensatoryPension::CREDITOR_CHOICES_LABELS[0] => CompensatoryPension::CREDITOR_CHOICES_VALUES[0],
                    CompensatoryPension::CREDITOR_CHOICES_LABELS[1] => CompensatoryPension::CREDITOR_CHOICES_VALUES[1],
                ],
                'placeholder' => 'Seleccione un cónyuge',
                'label' => 'Cónyuge que recibirá la pensión',
            ])
            ->add('amount', MoneyType::class, [
                'label' => 'Importe de pensión'
            ])
            ->add('hasLimit', CheckboxType::class, [
                'label' => ' ',
                'data' => true,
                'required' => false
            ])
            ->add('term', IntegerType::class, [
                'label' => 'Plazo de pensión'
            ])
            ->add('term_time', ChoiceType::class,[
                'choices'  => [
                    CompensatoryPension::TERM_TIME_CHOICES_LABELS[0] => CompensatoryPension::TERM_TIME_CHOICES_VALUES[0],
                    CompensatoryPension::TERM_TIME_CHOICES_LABELS[1] => CompensatoryPension::TERM_TIME_CHOICES_VALUES[1],
                ],
                'placeholder' => 'Seleccione un plazo',
                'label' => 'Meses / Años',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CompensatoryPension::class,
        ]);
    }
}