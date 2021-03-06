<?php


namespace App\Form;

use App\Entity\House;
use App\Util\Street;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HouseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street', ChoiceType::class, [
                'choices' => Street::getStreets(),
                'placeholder' => 'Seleccione una opción',
                'label' => 'Tipo de vía'
            ])
            ->add('address', null, [
                'label' => 'Dirección del último domicilio conyugal'
            ])
            ->add('town', null, [
                'label' => 'Ciudad del último domicilio conyugal'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => House::class,
        ]);
    }
}