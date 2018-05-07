<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/05/07
 * Time: 10:25
 */

namespace App\Form;


use App\Entity\BInstalledSw;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CmdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('software', EntityType::class, [
            'class' => BInstalledSw::class,
            'choice_label' => 'swName',
            'expanded' => false,
            'multiple' => false
        ])
            ->add('cmdName', TextType::class, [
                'label' => 'Command Name'
            ])
            ->add('cmdActive', ChoiceType::class,[
                'choices' => [
                    'No' => 0,
                    'Yes' => 1
                ]
            ])
            ;
    }
}