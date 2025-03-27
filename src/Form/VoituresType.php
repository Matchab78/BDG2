<?php

namespace App\Form;

use App\Entity\Etat;
use App\Entity\Voitures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoituresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prixV')
            ->add('stock')
            ->add('description')
            ->add('vitesse')
            ->add('acceleration')
            ->add('image')
            ->add('annee')
            ->add('chevaux')
            ->add('moteur')
            ->add('carburant')
            ->add('boiteAuto')
            ->add('conso')
            ->add('Co2')
            ->add('etat', EntityType::class, [
                'class' => Etat::class,
                'choice_label' => 'type', // Assurez-vous que la classe Etat a une propriété "type"
                'placeholder' => 'Sélectionnez un état',
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voitures::class,
        ]);
    }
}
