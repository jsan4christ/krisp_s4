<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/27
 * Time: 15:58
 */

namespace App\Form;


use App\Entity\BPublications;
use Doctrine\DBAL\Types\FloatType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('doi', TextType::class)
            ->add('title', TextType::class)
            ->add('authors', TextType::class)
            ->add('abstract', CKEditorType::class, [
                'config' => [
                    'uiColor' => '#ffffff'
                ]
            ] )
            ->add('journal', TextType::class)
            ->add('volume', TextType::class)
            ->add('citations', IntegerType::class)
            ->add('link', TextType::class)
            ->add('file', FileType::class, [
                'label' => 'Upload Publication (Only PDF)',
                'data_class' => null,
            ])
            ->add('keywords', TextType::class)
            ->add('topdescription', TextType::class, [
                'label' => 'Top Description'
            ])
            ->add('pages', TextType::class)
            ->add('datafile', TextType::class, [
                'label' => 'Data File',

            ])
            ->add('date', ChoiceType::class, [
                'choices' =>
                    range(date('Y'), date('Y')-20),
                'choice_label' => function($value){return $value;},
            ])
            ->add('issn', TextType::class, [
                'label' => 'ISSN'
            ])
            ->add('impact', NumberType::class, [
                'scale' => 3,
            ])
            ->add('bioafricaSATuRN', IntegerType::class, [
                'label' => 'Bioafrica SATuRN'
            ])
            ->add('video', IntegerType::class)
            ->add('shorttitle', TextType::class, [
                'label' => 'Short Title'
            ])
            ->add('feature', TextType::class)
            ->add('projectid', IntegerType::class, [
                'label' => 'Project ID'
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
           [ 'data_class' => BPublications::class,

               ]);
    }
}