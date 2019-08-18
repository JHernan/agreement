<?php


namespace App\Form;

use App\Repository\RequestTypeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('request_type', EntityType::class, [
                'class' => \App\Entity\RequestType::class,
                'query_builder' => function (RequestTypeRepository $er) {
                    return $er->createQueryBuilder('rt');
                },
                'choice_label' => 'name',
                'label' => 'Indique el tipo de Convenio'
            ])
            ->add('marriage', MarriageType::class, [
                'data_class' => 'App\Entity\Marriage'
            ])
            ->add('town', null, [
                'label' => 'Indique la ciudad del Convenio'
            ])
            ->add('date', DateType::class, [
                'widget' => 'choice',
                'label' => 'Indique la fecha del Convenio'
            ])
            ->add('save', SubmitType::class)
        ;
    }
}