<?php


namespace App\Form;

use App\Entity\Agreement;
use App\Entity\Request;
use App\Repository\RequestTypeRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('request_type', ChoiceType::class, [
                'choices'  => [
                    Request::REQUEST_TYPE_CHOICES[0] => Request::REQUEST_TYPE_CHOICES[0],
                    Request::REQUEST_TYPE_CHOICES[1] => Request::REQUEST_TYPE_CHOICES[1],
                ],
                'label' => 'Tipo de Convenio',
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('marriage', MarriageType::class, [
                'data_class' => 'App\Entity\Marriage'
            ])
            ->add('town', null, [
                'label' => 'Ciudad del Convenio'
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Fecha del Convenio',
                'html5' => false,
                'format' => 'dd-MM-yyyy',
                'empty_data' => null,
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
            'validation_groups' => function (FormInterface $form) {
                $data = $form->getData();
                if ($data->getAgreement()->getCustody() == Agreement::CUSTODY_COMPARTIDA) {
                    return ['Default', 'compartida'];
                }

                return ['Default', 'monoparental'];
            },
        ]);
    }
}