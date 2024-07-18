<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('email', null, ['label' => 'Votre Email'])
        ->add('fisrtName', null, ['label' => 'Votre prénom'])
        ->add('lastName', null, ['label' => 'Votre nom'])
        ->add('birthDay', null, ['label' => 'Votre date de naissance'])
        ->add('gender', ChoiceType::class, [
            'choices'  => [
                'Genre' => 'default',
                'Homme' => 'Homme',
                'Femme' => 'Femme',
                'Je ne veux pas le dire' => 'Je ne veux pas le dire',
                'Chat' => 'Chat',
                'Marmotte' => 'Marmotte',
            ],
            'label' => 'Votre genre'
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}