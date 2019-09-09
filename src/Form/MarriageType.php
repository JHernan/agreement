<?php


namespace App\Form;

use App\Entity\Marriage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarriageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('town', null, [
                'label' => 'Introduzca la ciudad donde se realizó el matrimonio'
            ])
            ->add('date', null, [
                'label' => 'Introduzca la fecha en la que se realizó el matrimonio'
            ])
            ->add('marriage_type',ChoiceType::class, [
                'choices'  => [
                    'Canónico' => 'Canónico',
                    'Civil' => 'Civil',
                ],
            ])
            ->add('economic_system', ChoiceType::class, [
                'choices'  => [
                    'Sociedad de gananciales' => 'sociedad de gananciales',
                    'Separación de bienes' => 'separación de bienes',
                ],
                'label' => 'Indique el régimen económico del matrimonio'
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