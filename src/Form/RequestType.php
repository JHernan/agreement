<?php


namespace App\Form;

use App\Entity\Request;
use App\Repository\RequestTypeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('request_type', ChoiceType::class, [
                'choices'  => [
                    'Divorcio' => 'Divorcio',
                    'Separación' => 'Separación',
                ],
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
            ->add('agreement', AgreementType::class, [
                'data_class' => 'App\Entity\Agreement'
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Request::class,
        ]);
    }
}