<?php


namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class HouseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('address', null, [
                'label' => 'Indique la dirección del último domicilio conyugal'
            ])
            ->add('town', null, [
                'label' => 'Indique la ciudad del último domicilio conyugal'
            ])
        ;
    }
}