<?php

namespace App\Form;

use App\Entity\Tag;
use App\DTO\GiftSearchDTO;
use Doctrine\DBAL\Types\DecimalType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GiftSuggestionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', NumberType::class, [
                'scale' => 2,
                // options for the price field
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'Unisexe' => '0',
                    'Homme' => '1',
                    'Femme' => '2',
                ],
                // options for the gender field
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'multiple' => true,
                'expanded' => true,
                // options for the tags field
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Submit',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Set the data class for the form to bind to
            'data_class' => GiftSearchDTO::class,
            'method' => 'GET'
        ]);
    }
}
