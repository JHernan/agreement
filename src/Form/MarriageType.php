<?php


namespace App\Form;

use App\Entity\Marriage;
use App\Repository\EconomicSystemRepository;
use App\Repository\MarriageTypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('marriage_type', EntityType::class, [
                'class' => \App\Entity\MarriageType::class,
                'query_builder' => function (MarriageTypeRepository $er) {
                    return $er->createQueryBuilder('mt');
                },
                'choice_label' => 'name',
            ])
            ->add('economic_system', EntityType::class, [
                'class' => \App\Entity\EconomicSystem::class,
                'query_builder' => function (EconomicSystemRepository $er) {
                    return $er->createQueryBuilder('es');
                },
                'choice_label' => 'name',
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