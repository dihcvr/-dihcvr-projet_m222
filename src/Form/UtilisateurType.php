<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                    'label' => "Roles",
                    'choices' => [
                        'Gérant' => 'ROLE_GERANT',
                        'Vendeur' => 'ROLE_VENDEUR',
                        'Magasinier' => 'ROLE_MAGASINIER',
                        'Livreur' => 'ROLE_LIVREUR',
                    ],
                ]])
            ->add('password', PasswordType::class)
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('whatsapp_perso')
            ->add('tel_sav')
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
