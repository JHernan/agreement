<?php


namespace App\Form;

use App\Entity\Child;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'Nombre',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha de nacimiento',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'attr' => ['class' => 'form-control datepicker'],
                'empty_data' => null,
            ])
            ->add('registry', null, [
                'label' => 'Registro Civil',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('volume', IntegerType::class, [
                'label' => 'Volumen o Tomo de la inscripción',
                'attr' => ['class' => 'form-control child-registry-volume'],
            ])
            ->add('page', IntegerType::class, [
                'label' => 'Página de la inscripción',
                'attr' => ['class' => 'form-control child-registry-page'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}