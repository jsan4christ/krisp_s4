<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/10
 * Time: 13:43
 */

namespace App\Form;


use App\Entity\BInstalledSw;
use App\Entity\BPeople;
use App\Entity\BSwExpert;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('person',EntityType::class, [
                    'class' => BPeople::class,
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false
                 ])

                ->add('type',ChoiceType::class, [
                    'choices' => [
                        'Expert User',
                        'Expert Installer',
                        'Both'
                    ]
                ])
                ->add('software', EntityType::class, [
                    'class' => BInstalledSw::class,
                    'choice_label' => 'swName',
                    'multiple' => false,
                    'expanded' => false
                ])
                ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BSwExpert::class
        ]);
    }
}