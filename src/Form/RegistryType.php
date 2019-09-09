<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('town', null, [
                'label' => 'Introduzca la ciudad del registro civil'
            ])
            ->add('volume', null, [
                'label' => 'Introduzca el volumen del registro civil'
            ])
            ->add('page', null, [
                'label' => 'Introduzca la página del registro civil'
            ])
        ;
    }}