<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 14:09
 */

namespace App\Form;


use App\Entity\BServer;
use App\Entity\BSwInstLocn;
use App\Form\Type\DateTimePickerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('software', EntityType::class,[
                    'class' => BSwInstLocn::class,
                    'choice_label' => 'swName',
                    'multiple' => false,
                    'expanded' => false
            ])
                ->add('server', EntityType::class, [
                    'class' => BServer::class,
                    'choice_label' => 'svrName',
                    'multiple' => false,
                    'expanded' => false
            ])
                ->add('installLocn', TextType::class, [
                    'label' => 'Install Location'
            ])
                ->add('installDate', DateTimePickerType::class,[
                    'label' => 'Install Date'
            ])
                ->add('howToLoad', TextType::class, [
                    'label' => 'How to Load'
            ])
                ->add('howToUnload', TextType::class, [
                    'label' => 'How to Unload'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BSwInstLocn::class
        ]);
    }
}