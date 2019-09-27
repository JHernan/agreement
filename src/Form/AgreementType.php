<?php


namespace App\Form;

use App\Entity\Agreement;
use App\Entity\PickUp;
use App\Repository\PickUpRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                    'Compartida' => '1',
                    'Monoparental' => '2',
                ],
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('pick_up', ChoiceType::class, [
                'choices'  => [
                    'El centro escolar el viernes, a la finalización del horario lectivo' => '1',
                    'El domicilio del otro progenitor el viernes a una hora determinada' => '2',
                ],
            ])
            ->add('pick_up_hour', TextType::class)
            ->add('delivery', ChoiceType::class, [
                'choices'  => [
                    'El centro escolar el lunes, al comienzo del horario lectivo' => '1',
                    'El domicilio del otro progenitor el domingo a una hora determinada' => '2',
                ],
            ])
            ->add('delivery_hour', TextType::class)
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