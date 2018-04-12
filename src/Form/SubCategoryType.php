<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 13:36
 */

namespace App\Form;


use App\Entity\BSwSubcat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('subcatName', TextType::class, [
            'label' => 'Subcategory'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => BSwSubcat::class
        ]);
    }
}