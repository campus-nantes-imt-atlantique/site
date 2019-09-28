<?php


namespace App\Entity;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class,["label" => false,'attr' => array('placeholder' => 'Nom','class' => 'browser-default textField')]);
        $builder->add('email',EmailType::class,["label" => false,'attr' => array('placeholder' => 'Email', 'class' => 'browser-default textField')]);
        $builder->add('office', ChoiceType::class, [
            "label" => false,
            'choices'  => [
                'BDA' => 'Bureau des Arts',
                'BDE' => 'Bureau des Élèves',
                'BDS' => 'Bureau des Sports',
                'JA' => 'Junior Atlantique',
            ], 'attr' => array('class' => 'browser-default textField'), 'expanded' => false , 'multiple' => false ] );
        $builder->add('subject', TextType::class,["label" => false,'attr' => array('placeholder' => 'Sujet','class' => 'browser-default textField')]);
        $builder->add('message', TextareaType::class,["label" => false,'attr' => array('placeholder' => 'Message','class' => 'browser-default textField textArea')]);
        $builder->add('send', SubmitType::class, ['label' => 'Envoyer', 'attr' => array('class' => 'buttonContactForm roundedBorderedWhiteButton')]);
    }

    public function getName()
    {
        return 'contact';
    }

}