<?php

namespace App\Form;

use App\Entity\Equipement;
use App\Entity\GiteSearch;
use App\Entity\Region;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('minSurface', IntegerType::class, [
                "required" => false,
                "label" => false,
                "attr" => ["placeholder" => "Surface min. (m²)"]
            ])
            ->add('minChambre', IntegerType::class, [
                "required" => false,
                "label" => false,
                "attr" => ["placeholder" => "Nombre de chambres min."]
            ])
            ->add('minCouchage', IntegerType::class, [
                "required" => false,
                "label" => false,
                "attr" => ["placeholder" => "Nombre de couchages min."]
            ])
            ->add('submit', SubmitType::class, [
                "label" => "Trouver mon gite",
                "attr" => ["class" => "btn btn-outline-info"]
            ])
            ->add('equipement', EntityType::class, [
                "required" => false,
                "label" => false,
                "class" => Equipement::class,
                "choice_label" => 'name',
                "multiple" => true,
                "expanded" => true
            ])
            ->add('maxTarif', MoneyType::class, [
                "required" => false,
                "label" => false,
                "attr" => ["placeholder" => "Tarif hedbo max."]
            ])
            ->add('region', EntityType::class, [
                "class" => Region::class,
                "choice_label" => "nom",
                "label" => "Région(s)",
                "multiple" => true,
                "required" => false,
                "expanded" => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GiteSearch::class,
        ]);
    }
}
