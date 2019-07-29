<?php


namespace App\Form;

use App\Repository\EconomicSystemRepository;
use App\Repository\MarriageTypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MarriageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('town')
            ->add('date')
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
    ;
    }
}