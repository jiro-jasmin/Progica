<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\Gite;
use App\Entity\Region;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('surface')
            ->add('chambre')
            ->add('couchage')
            ->add('equipements', EntityType::class, [
                "class" => Equipement::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" => true
            ])
            ->add('proprietaire', EntityType::class, [
                "class" => User::class,
                "choice_label" => "username",
                "label" => "Propriétaire",
                "disabled" => true
            ])
            ->add('tarifHebdo', MoneyType::class)
            ->add('adresse')
            ->add('region', EntityType::class, [
                "class" => Region::class,
                "choice_label" => "nom",
                "label" => "Région"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gite::class,
        ]);
    }
}
