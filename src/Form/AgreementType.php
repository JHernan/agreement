<?php


namespace App\Form;

use App\Entity\Agreement;
use App\Entity\Custody;
use App\Entity\PickUp;
use App\Repository\CustodyRepository;
use App\Repository\PickUpRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AgreementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('custody', EntityType::class, [
                'class' => Custody::class,
                'query_builder' => function (CustodyRepository $er) {
                    return $er->createQueryBuilder('c');
                },
                'choice_label' => 'name',
                'placeholder' => '',
                'label' => 'Indique el tipo de custodia'
            ])
            ->add('pick_up', EntityType::class, [
                'class' => PickUp::class,
                'query_builder' => function (PickUpRepository $er) {
                    return $er->createQueryBuilder('pu');
                },
                'choice_label' => 'name',
                'placeholder' => '',
                'label' => 'Indique el tipo de recogida de los menores'
            ])
            ->add('alternate_weeks', null, [
                'label' => 'Indique el número de semanas alternas de la custodia'
            ])
            ->add('partner', ChoiceType::class, [
                'choices'  => [
                    '1' => 1,
                    '2' => 2,
                ],
                'placeholder' => '',
                'label' => 'Indique el cónyuge que tendrá la custodia monoparental'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Agreement::class,
        ]);
    }
}