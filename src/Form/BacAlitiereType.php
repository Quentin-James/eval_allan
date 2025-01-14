<?php

// src/Form/BacAlitiereType.php
namespace App\Form;

use App\Entity\BacAlitiere;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BacALitiereType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class)
            ->add('description', TextType::class)
            ->add('dimensions', TextType::class)
            ->add('matiere', TextType::class)
            ->add('quantiteStock', IntegerType::class)
            ->add('couleur', TextType::class)
            ->add('codeBarre', TextType::class)
            ->add('marque', null, [
                'choice_label' => 'nom',
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BacAlitiere::class,
        ]);
    }
}
