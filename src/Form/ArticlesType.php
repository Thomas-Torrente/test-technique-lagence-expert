<?php

namespace App\Form;

use App\Entity\Articles;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Titre de l\'article',
                ],
            ])
            ->add(
                'content',
                CKEditorType::class,
                [
                    'label' => 'Contenu * :',
                    'required' => true,
                    'constraints' => [
                        new \Symfony\Component\Validator\Constraints\NotBlank([
                            'message' => 'Veuillez entrer un contenu',
                        ]),
                    ],

                ],

            )
            ->add('imageFile', VichFileType::class, [
                'label' => 'Image *',
                'required' => true,
            ])
            ->add('slug', TextType::class, [
                'label' => 'Slug',
                'required' => true,
                'attr' => [
                    'placeholder' => 'Slug de l\'article',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
