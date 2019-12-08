<?php


namespace App\Form;

use App\Entity\Marriage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;

class MarriageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('town', null, [
                'label' => 'Ciudad donde se realizó el matrimonio'
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha en la que se realizó el matrimonio',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'empty_data' => null,
            ])
            ->add('marriage_type',ChoiceType::class, [
                'choices'  => [
                    Marriage::MARRIAGE_TYPE_CHOICES[0] => Marriage::MARRIAGE_TYPE_CHOICES[0],
                    Marriage::MARRIAGE_TYPE_CHOICES[1] => Marriage::MARRIAGE_TYPE_CHOICES[1],
                ],
                'placeholder' => 'Seleccione una opción',
                'label' => 'Tipo de matrimonio',
            ])
            ->add('economic_system', ChoiceType::class, [
                'choices'  => [
                    Marriage::ECONOMIC_SYSTEM_CHOICES[0] => Marriage::ECONOMIC_SYSTEM_CHOICES[0],
                    Marriage::ECONOMIC_SYSTEM_CHOICES[1] => Marriage::ECONOMIC_SYSTEM_CHOICES[1],
                ],
                'label' => 'Régimen económico del matrimonio',
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('registry', RegistryType::class, [
                'data_class' => 'App\Entity\Registry'
            ])
            ->add('partner_first', PartnerType::class, [
                'data_class' => 'App\Entity\Partner'
            ])
            ->add('partner_second', PartnerType::class, [
                'data_class' => 'App\Entity\Partner'
            ])
            ->add('house', HouseType::class, [
                'data_class' => 'App\Entity\House'
            ])
            ->add('children', CollectionType::class, [
                'entry_type' => ChildType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'error_bubbling' => false,
                'constraints' => [
                    new Valid(),
                ],
            ]);
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Marriage::class,
        ]);
    }
}