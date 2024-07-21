<?php

namespace App\Form;

use App\Entity\Allergens;
use App\Entity\Ingrediens;
use App\Entity\Receipes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ReceipesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            
            ->add('allergens', EntityType::class, [
                'class' => Allergens::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
    
            ])
            ->add('ingrediens', EntityType::class, [
                'class' => Ingrediens::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Receipes::class,
        ]);
    }
}