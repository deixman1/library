<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Books;

class BooksType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return FormBuilderInterface
     */
    public function buildForm(FormBuilderInterface $builder, array $options): FormBuilderInterface
    {
        return $builder
            ->setMethod('GET')
            ->add('name', TextType::class, ['label' => 'Название книги'])
            ->add('author', TextType::class, ['label' => 'Автор книги'])
            ->add('year', IntegerType::class, ['label' => 'Год издания книги'])
            ->add('submit', SubmitType::class, ['label' => 'Сохранить'])
        ;
    }
    /**
     * @param OptionsResolver $resolver
     * @return OptionsResolver
     */
    public function configureOptions(OptionsResolver $resolver): OptionsResolver
    {
        return $resolver->setDefaults([
            'data_class' => Books::class,
        ]);
    }
}
