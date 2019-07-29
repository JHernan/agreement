<?php


namespace App\Form;

use App\Repository\EconomicSystemRepository;
use App\Repository\MarriageTypeRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('town')
            ->add('volume')
            ->add('page')
        ;
    }}