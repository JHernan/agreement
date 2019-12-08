<?php


namespace App\Form;

use App\Entity\Child;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ])
            ->add('registry', null, [
                'label' => 'Registro Civil',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('volume', null, [
                'label' => 'Volumen del Registro Civil',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('page', null, [
                'label' => 'Página del Registro Civil',
                'attr' => ['class' => 'form-control'],
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