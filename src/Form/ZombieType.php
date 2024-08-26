<?php

namespace App\Form;

use App\Entity\Zombie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ZombieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3],
            ])
            ->add('image', FileType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control-file'],
            ])
            ->add('status', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3],
            ])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'btn btn-lg mt-3', 'style' => 'background-color: #FF4500; color: #FFFFFF; border: none;'],
            ])
            ->add('season', IntegerType::class, [
                'required' => false,
                'attr' => ['min' => 1, 'max' => 11],
            ])
            ->add('episode', IntegerType::class, [
                'required' => false,
                'attr' => ['min' => 1],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Zombie::class,
        ]);
    }
}