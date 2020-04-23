<?php


namespace App\Form;

use App\Entity\Partner;
use App\Util\Nationality;
use App\Util\Street;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PartnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',ChoiceType::class, [
                'choices'  => [
                    Partner::TITLE_LABELS[0] => Partner::TITLE_VALUES[0],
                    Partner::TITLE_LABELS[1] => Partner::TITLE_VALUES[1],
                ],
                'placeholder' => 'Seleccione una opción',
                'label' => 'Tratamiento'
            ])
            ->add('dni', null, [
                'label' => 'DNI'
            ])
            ->add('first_name', null, [
                'label' => 'Nombre'
            ])
            ->add('last_name', null, [
                'label' => 'Apellidos'
            ])
            ->add('nationality', ChoiceType::class, [
                'choices' => Nationality::getNationalities(),
                'placeholder' => 'Seleccione una opción',
                'label' => 'Nacionalidad'
            ])
            ->add('street', ChoiceType::class, [
                'choices' => Street::getStreets(),
                'placeholder' => 'Seleccione una opción',
                'label' => 'Tipo de vía'
            ])
            ->add('address', null, [
                'label' => 'Dirección'
            ])
            ->add('town', null, [
                'label' => 'Localidad'
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