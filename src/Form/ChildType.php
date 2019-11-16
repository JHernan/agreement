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
                'label' => 'Indique el nombre del hijo/a'
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Indique la fecha de nacimiento del hijo/a',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'attr' => ['class' => 'datepicker'],
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