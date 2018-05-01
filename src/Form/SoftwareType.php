<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 11:18
 */

namespace App\Form;


use App\Entity\BInstalledSw;
use App\Entity\BSwCat;
use App\Entity\BSwSubcat;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoftwareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('swName', TextType::class)
                ->add('swDesc', TextType::class)
                ->add('swUrl', UrlType::class)
                ->add('category', EntityType::class,[
                        'class' => BSwCat::class,
                        'choice_label' => 'catName',
                        'expanded' => false,
                        'multiple' => false
                ])
                ->add('subcategory', EntityType::class,[
                'class' => BSwSubcat::class,
                'choice_label' => 'subcatName',
                'expanded' => false,
                'multiple' => false
                ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BInstalledSw::class
        ]);
    }
}