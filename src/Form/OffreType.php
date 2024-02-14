<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\Service;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextareaType::class, [
                'label' => 'Nom de l\'offre',
                'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2"
                ]
           ])
            ->add('description', TextareaType::class, [
                 'label' => 'Description',
                 'attr' => [
                    'class' => "border-2 border-blue-500 rounded-lg p-2"
                ]
            ])
            ->add('salaire', )
            ->add('service', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'nom',
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer offre',
                'attr' => [
                    'class' => "bg border-blue-500 rounded-lg p-2"
                ]
                
            ])
           ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
