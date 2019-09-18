<?php


namespace App\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class );
        $builder->add('email',EmailType::class);
        $builder->add('office', ChoiceType::class, [
            'choices'  => [
                'BDA' => 'Bureau des Arts',
                'BDE' => 'Bureau des Élèves',
                'BDS' => 'Bureau des Sports',
                'JA' => 'Junior Atlantique',
            ], 'attr' => array('class' => 'browser-default'), 'expanded' => false , 'multiple' => false ] );
        $builder->add('subject', TextType::class );
        $builder->add('message', TextareaType::class);
    }

    public function getName()
    {
        return 'contact';
    }

}