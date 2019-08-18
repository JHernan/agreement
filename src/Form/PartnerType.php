<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dni', null, [
                'label' => 'Introduzca el DNI del cónyuge'
            ])
            ->add('name', null, [
                'label' => 'Introduzca el nombre del cónyuge'
            ])
            ->add('nationality', null, [
                'label' => 'Introduzca la nacionalidad del cónyuge'
            ])
            ->add('address', null, [
                'label' => 'Introduzca la dirección del cónyuge'
            ])
            ->add('town', null, [
                'label' => 'Introduzca la ciudad de la dirección del cónyuge'
            ])
        ;
    }
}