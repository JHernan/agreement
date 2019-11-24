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
                    Agreement::CUSTODY_CHOICES[0] => Agreement::CUSTODY_CHOICES[0],
                    Agreement::CUSTODY_CHOICES[1] => Agreement::CUSTODY_CHOICES[1],
                ],
                'placeholder' => 'Seleccione una opción',
                'label' => 'Tipo de custodia'
            ])
            ->add('pick_up', ChoiceType::class, [
                'choices'  => [
                    Agreement::PICK_UP_CHOICES_LABELS[0] => Agreement::PICK_UP_CHOICES_VALUES[0],
                    Agreement::PICK_UP_CHOICES_LABELS[1] => Agreement::PICK_UP_CHOICES_VALUES[1],
                ],
                'label' => 'Hora de recogida',
                'placeholder' => 'Seleccione una opción',
                'required' => false
            ])
//            ->add('pick_up_hour', TextType::class)
            ->add('delivery', ChoiceType::class, [
                'choices'  => [
                    Agreement::DELIVERY_CHOICES_LABELS[0] => Agreement::DELIVERY_CHOICES_VALUES[0],
                    Agreement::DELIVERY_CHOICES_LABELS[1] => Agreement::DELIVERY_CHOICES_VALUES[1],
                ],
                'label' => 'Hora de entrega',
                'placeholder' => 'Seleccione una opción',
                'required' => false
            ])
//            ->add('delivery_hour', TextType::class)
            ->add('alternate_weeks', null, [
                'label' => 'Semanas alternas de la custodia',
                'required' => false
            ])
            ->add('summer_period', ChoiceType::class, [
                'choices'  => [
                    Agreement::SUMMER_PERIOD_CHOICES_LABELS[0] => Agreement::SUMMER_PERIOD_CHOICES_VALUES[0],
                    Agreement::SUMMER_PERIOD_CHOICES_LABELS[1] => Agreement::SUMMER_PERIOD_CHOICES_VALUES[1],
                ],
                'label' => 'Periodo de verano',
                'placeholder' => 'Seleccione una opción',
                'required' => false
            ])
            ->add('partner', ChoiceType::class, [
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                ],
                'placeholder' => '',
                'label' => 'Indique el cónyuge que tendrá la custodia monoparental',
                'required' => false
            ]) /* TODO partner */
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Agreement::class,
        ]);
    }
}