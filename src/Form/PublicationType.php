<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/27
 * Time: 15:58
 */

namespace App\Form;


use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PublicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('authors', TextType::class)
            ->add('abstract', TextareaType::class)
            ->add('journal', TextType::class)
            ->add('volume', TextType::class)
            ->add('citations', IntegerType::class)
            ->add('link', TextType::class)
            ->add('file', FileType::class)
            ->add('keywords', TextType::class)
            ->add('topdescription', TextType::class)
            ->add('pages', IntegerType::class)
            ->add('datafile', TextType::class)
            ->add('date', ChoiceType::class, [
                'choice_label' => range(date('Y'), date('Y')-20)
            ])
            ->add('doi', TextType::class)
            ->add('issn', TextType::class)
            ->add('impact', FloatType::FLOAT)
            ->add('bioafricaSATuRN', IntegerType::class)
            ->add('video', IntegerType::class)
            ->add('shorttitle', TextType::class)
            ->add('feature', TextType::class)
            ->add('projectid', IntegerType::class)
            ;

    }
}