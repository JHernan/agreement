<?php


namespace App\Form;

use App\Entity\Registry;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('volume', IntegerType::class, [
                'label' => 'Volumen o Tomo de la inscripción'
            ])
            ->add('page', IntegerType::class, [
                'label' => 'Página de la inscripción'
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