<?php

namespace App\Form;

use App\Entity\Subscriber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstName', TextType::class, [
            'attr' => [
                'placeholder' => 'Enter your name here',
                'class' => 'custom_class',
                'required' => false
                 ]
        ])
        ->add('lastName', TextType::class)
        ->add('email', EmailType::class)
        ->add('comment', TextareaType::class, [
            'attr' => [
                'placeholder' => 'Enter your comment here'
            ]
        ])
        ->add('save', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-success'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subscriber::class,
        ]);
    }
}
