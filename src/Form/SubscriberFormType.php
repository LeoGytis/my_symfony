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
use Captcha\Bundle\CaptchaBundle\Form\Type\CaptchaType;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints\ValidCaptcha;


class SubscriberFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstName')
        ->add('lastName')
        ->add('email')
        ->add('comment')
        ->add('captchaCode', CaptchaType::class, array(
            'captchaConfig' => 'ExampleCaptchaUserRegistration',
            'constraints' => [
                new ValidCaptcha([
                    'message' => 'Invalid captcha, please try again',
                ]),
            ],
        ))
    ;
      
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subscriber::class,
        ]);
    }
}
