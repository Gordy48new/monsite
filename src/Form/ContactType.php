<?php 
// src/Form/ArticleType.php
namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, ['label' => 'Titre','required' => true])
            ->add('content', TextareaType::class, ['label' => 'Description de l\'article', 'disabled' => true])
            ->add('author', TextType::class, ['label' => 'Auteur'])
            ->add('price', CurrencyType::class, ['label' => 'Prix'])
            ->add('startDate', DateType::class, ['label' => 'Date de publication'])
            ->add('endDate', DateType::class, ['label' => 'Date de vente'])
            ->add('email', EmailType::class, ['label' => 'Adresse email'])
            ->add('phoneNumber', TelType::class, ['label' => 'Telephone'])
            ->add('color', CheckboxType::class, [
                'label'    => 'Se faire livrer',
                'required' => false,
            ])            
            ->add('signed', RadioType::class, ['label' => 'Autographe'])
            ->add('city', CountryType::class,['label' => 'Ville de publication'] )
            ->add('country', CountryType::class, ['label' => 'Pays de publication'])
            ->add('save', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ]);
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}