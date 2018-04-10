<?php
/**
 * Created by PhpStorm.
 * User: sanem
 * Date: 2018/04/07
 * Time: 20:24
 */

namespace App\Form;

use App\Entity\BServer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ServerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('svrName',TextType::class,[
                'label' => 'Server Name',
            ])
            ->add('svrIP', TextType::class,[
                'label' => 'Server IP Address'
            ])
            ->add('svrAddr', TextType::class, [
                'label' => 'Server URL'
            ])
            ->add('instnsToAccess', TextareaType::class, [
                'label' => 'Instructions to Access Server'
            ])
            ->add('instnsToReqAcc', TextareaType::class, [
                'label' => 'Instructions to Request Access'
            ])
            ;
    }

    /**
     * {@inheritdoc}
     */
    public  function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BServer::class,
        ]);
    }
}