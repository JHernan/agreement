<?php


namespace App\Form;

use App\Entity\Agreement;
use App\Entity\PickUp;
use App\Repository\PickUpRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AgreementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('partner_home_use', ChoiceType::class, [
                'choices'  => [
                    Agreement::PARTNER_CHOICES_LABELS[0] => Agreement::PARTNER_CHOICES_VALUES[0],
                    Agreement::PARTNER_CHOICES_LABELS[1] => Agreement::PARTNER_CHOICES_VALUES[1],
                ],
                'placeholder' => 'Seleccione un cónyuge',
                'label' => 'Indique el cónyuge que tendrá el uso y disfrute del domicilio conyugal',
            ])
            ->add('custody', ChoiceType::class, [
                'choices'  => [
                    Agreement::CUSTODY_CHOICES[0] => Agreement::CUSTODY_CHOICES[0],
                    Agreement::CUSTODY_CHOICES[1] => Agreement::CUSTODY_CHOICES[1],
                ],
                'placeholder' => 'Seleccione una opción',
                'label' => 'Tipo de custodia',
                'required' => false
            ])
            ->add('pick_up', ChoiceType::class, [
                'choices'  => [
                    Agreement::PICK_UP_CHOICES_LABELS[0] => Agreement::PICK_UP_CHOICES_VALUES[0],
                    Agreement::PICK_UP_CHOICES_LABELS[1] => Agreement::PICK_UP_CHOICES_VALUES[1],
                ],
                'label' => 'Recogida',
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('pick_up_hour', TimeType::class, [
                'label' => 'Hora de recogida',
                'placeholder' => 'Selecciona una hora',
                'widget' => 'choice',
                'hours' => ['15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00'],
                'with_minutes' => false,
            ])
            ->add('delivery', ChoiceType::class, [
                'choices'  => [
                    Agreement::DELIVERY_CHOICES_LABELS[0] => Agreement::DELIVERY_CHOICES_VALUES[0],
                    Agreement::DELIVERY_CHOICES_LABELS[1] => Agreement::DELIVERY_CHOICES_VALUES[1],
                ],
                'label' => 'Entrega',
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('delivery_hour', TimeType::class, [
                'label' => 'Hora de entrega',
                'placeholder' => 'Selecciona una hora',
                'input' => 'string',
                'widget' => 'single_text'
            ])
            ->add('alternate_weeks', null, [
                'label' => 'Semanas alternas de la custodia',
            ])
            ->add('summer_period', ChoiceType::class, [
                'choices'  => [
                    Agreement::SUMMER_PERIOD_CHOICES_LABELS[0] => Agreement::SUMMER_PERIOD_CHOICES_VALUES[0],
                    Agreement::SUMMER_PERIOD_CHOICES_LABELS[1] => Agreement::SUMMER_PERIOD_CHOICES_VALUES[1],
                ],
                'label' => 'Periodo de verano',
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('partner', ChoiceType::class, [
                'choices'  => [
                    Agreement::PARTNER_CHOICES_LABELS[0] => Agreement::PARTNER_CHOICES_VALUES[0],
                    Agreement::PARTNER_CHOICES_LABELS[1] => Agreement::PARTNER_CHOICES_VALUES[1],
                ],
                'placeholder' => 'Seleccione un cónyuge',
                'label' => 'Indique el cónyuge que tendrá la custodia monoparental',
            ])
            ->add('alimony', AlimonyType::class, [
                'data_class' => 'App\Entity\Alimony'
            ])
            ->add('compensatory_pension', CompensatoryPensionType::class, [
                'data_class' => 'App\Entity\CompensatoryPension'
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