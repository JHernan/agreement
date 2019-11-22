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
                'label' => 'Ciudad del registro civil'
            ])
            ->add('volume', null, [
                'label' => 'Volumen del registro civil'
            ])
            ->add('page', null, [
                'label' => 'Página del registro civil'
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