<?php


namespace App\Form;

use App\Entity\Registry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Registry::class,
        ]);
    }
}