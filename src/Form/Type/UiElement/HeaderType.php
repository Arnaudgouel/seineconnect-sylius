<?php

namespace App\Form\Type\UiElement;

use App\Form\Type\MediaAutocompleteRichEditorChoiceType;
use BitBag\SyliusCmsPlugin\Entity\MediaInterface;
use BitBag\SyliusCmsPlugin\Form\Type\MediaAutocompleteChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class HeaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title',
            ])
            ->add('subtitle', TextType::class, [
                'label' => 'app.ui.subtitle',
            ])
            ->add('image', MediaAutocompleteRichEditorChoiceType::class, [
                'label' => 'bitbag_sylius_cms_plugin.ui.image',
                'required' => false,
                'media_type' => MediaInterface::IMAGE_TYPE,
                'row_attr' => [
                    'data-controller' => 'media-autocomplete'
                ],
            ])
            ->add('imagePosition', ChoiceType::class, [
                'label' => 'app.ui.image_position',
                'choices' => [
                    'monsieurbiz_richeditor_plugin.form.align.left' => 'left',
                    'monsieurbiz_richeditor_plugin.form.align.right' => 'right',
                ],
            ])
            ->add('btnText', TextType::class, [
                'label' => 'app.ui.button_text',
                'required' => false,
            ])
            ->add('btnUrl', TextType::class, [
                'label' => 'app.ui.button_url',
                'required' => false,
            ])
        ;
    }
}
