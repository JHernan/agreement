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
                $validation_groups = ['Default'];
                $data = $form->getData();

                if($data->getMarriage()->getChildren()->count() > 0){
                    array_push($validation_groups, 'children');

                    if ($data->getAgreement()->getCustody() == Agreement::CUSTODY_COMPARTIDA) {
                        array_push($validation_groups, 'compartida');

                        if($data->getAgreement()->getAlimony()->getAlimony()){
                            array_push($validation_groups, 'alimony');
                        }
                    }else{
                        array_push($validation_groups, 'monoparental', 'alimony');
                    }
                }

                if($data->getAgreement()->getCompensatoryPension()->getIsPension()){
                    array_push($validation_groups, 'pension');

                    if($data->getAgreement()->getCompensatoryPension()->getHasLimit()){
                        array_push($validation_groups, 'term');
                    }
                }

                return $validation_groups;
            },
        ]);
    }
}