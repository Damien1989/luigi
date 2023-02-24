<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,
            [
                'label' => 'Votre titre',
                'constraints' => new Length(10, 2, 30),
                'attr' => [
                    'placeholder' => 'Merci de saisir le titre de votre programme...'
                ]
            ])
            ->add('synopsis', TextType::class,
            [
                'label' => 'Le synopsis',
                'constraints' => new Length(10, 2, 100),
                'attr' => [
                    'placeholder' => 'Merci de saisir le synopsis du programme...'
                ]
            ]

            )
            ->add('poster', TextType::class,
            [
                'label'=> 'Votre image'
            ])
            ->add('year')
            ->add('country', CountryType::class, [
                'label' => 'Pays',
                'attr' => [
        'placeholder' => 'Votre pays'
                    ]
    ])
            ->add('category', null, ['choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
