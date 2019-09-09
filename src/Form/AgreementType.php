<?php


namespace App\Form;

use App\Entity\Agreement;
use App\Entity\PickUp;
use App\Repository\PickUpRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AgreementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('custody', ChoiceType::class, [
                'choices'  => [
                    'Compartida' => 'Compartida',
                    'Monoparental' => 'Monoparental',
                ],
            ])
            ->add('pick_up', ChoiceType::class, [
                'choices'  => [
                    'El centro escolar el lunes, a la finalización del horario lectivo' => 'el centro escolar el lunes, a la finalización del horario lectivo',
                    'El domicilio del otro progenitor el domingo' => 'el domicilio del otro progenitor el domingo',
                ],
            ])
            ->add('alternate_weeks', null, [
                'label' => 'Indique el número de semanas alternas de la custodia'
            ])
            ->add('partner', ChoiceType::class, [
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                ],
                'placeholder' => '',
                'label' => 'Indique el cónyuge que tendrá la custodia monoparental'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Agreement::class,
        ]);
    }
}