<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\Event;
use App\Entity\EventPhoto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class EventPhotoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('url', FileType::class, [
                'label' => 'Foto',
                // make it optional so you don't have to re-upload the PDF file
                // everytime you edit the Product details
                'required' => false
            ])
            ->add('title')
            // ...
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EventPhoto::class,
        ]);
    }
}