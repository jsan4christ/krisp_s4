<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 13:25
 */

namespace App\Form;


use Doctrine\DBAL\Types\TextType;
use App\Entity\BSwCat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('catName',TextType::class,[
            'label' => 'Category Name'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => BSwCat::class
        ]);
    }
}