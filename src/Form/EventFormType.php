<?php
declare(strict_types=1);

namespace App\Form;

use App\Entity\EventPhoto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class EventFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('eventPhotos', CollectionType::class, [
            'entry_type' => EventPhotoFormType::class,
            'allow_delete' => true,
            'allow_add' => true,
            'by_reference' => false,
        ]);
    }
}