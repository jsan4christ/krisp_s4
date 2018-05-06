<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/27
 * Time: 15:56
 */

namespace App\Form;


use App\Entity\BPeople;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('telephone', TextType::class)
            ->add('fax', TextType::class)
            ->add('summary', TextareaType::class)
            ->add('image', FileType::class, [
                'label' => 'Upload Emoji (JPEG, PNG)',
            ])
            ->add('summary2', TextareaType::class)
            ->add('surname', TextType::class)
            ->add('initials', TextType::class)
            ->add('photo2', FileType::class, [
                'label' => 'Upload Photo (JPEG, PNG)',
            ])
            ->add('bioafricaSATuRN', IntegerType::class, [
                'label' => 'BioAfrica SATuRN'
            ])
            ->add('member', ChoiceType::class,[
                'choices' => [
                    'Member' => 'Member',
                    'Departed' => 'Departed'
                ],
                'label' => 'Member Status',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Management' => 'Management',
                    'Researcher' => 'Researcher'
                ]
            ])
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BPeople::class,
        ]);
    }
}