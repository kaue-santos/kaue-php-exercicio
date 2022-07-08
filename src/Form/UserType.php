<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Telefone;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    
            ->add('Nome',TextType::class)
            ->add('DataNascimento',DateType::class )
            ->add('Email',EmailType::class)
        ;
        #$builder
       #     ->add('IDtelefones', CollectionType::class, [
        #        'entry_type' => TelefoneType::class,
       #         'entry_options' => ['label' => false]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
