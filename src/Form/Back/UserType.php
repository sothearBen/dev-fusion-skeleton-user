<?php

namespace App\Form\Back;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'user.label.firstname',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'user.label.lastname',
            ])
            ->add('email', EmailType::class, [
                'label' => 'user.label.email',
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'user.label.roles',
                'choices' => [
                    'ROLE_USER_ADMIN' => 'ROLE_USER_ADMIN',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',
                ],
                'expanded' => true,
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'translation_domain' => 'back_messages',
        ]);
    }
}
