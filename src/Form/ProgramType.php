<?php

namespace App\Form;

use App\Entity\Program;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,
            [
                'label'=> 'Titre',
                'attr'=> [
                    'class' => 'p-3 rounded-3 border mb-3 shadow-none',
                    'placeholder' => 'Entrez le titre...'
                ]
            ]
            )
            ->add('synopsis')
            ->add('poster')
            ->add('year')
            ->add('country')
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
