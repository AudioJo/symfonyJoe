<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Chaton;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChatonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Sterelise')
            ->add('Photo')
            ->add("Categorie",EntityType::class, [
                'class'=>Categorie::class,//Choix de la classe liée
                'choice_label'=>'titre', //Choix de ce qui sera affiché comme texte
                'multiple'=>false,
                'expanded'=>false
            ])
            ->add('OK',SubmitType::class,["label"=>"Ok"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chaton::class,
        ]);
    }
}
