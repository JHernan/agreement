<?php


namespace App\Form;

use App\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni', null, [
                'label' => 'DNI'
            ])
            ->add('name', null, [
                'label' => 'Nombre'
            ])
            ->add('nationality', null, [
                'label' => 'Nacionalidad'
            ])
            ->add('address', null, [
                'label' => 'Dirección'
            ])
            ->add('town', null, [
                'label' => 'Ciudad de la dirección'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partner::class,
        ]);
    }
}