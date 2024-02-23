<?php

namespace App\Form\Extension\MonsieurBizRichEditorPlugin;

use BitBag\SyliusCmsPlugin\Form\Type\WysiwygType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\UiElement\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType as TextField;

final class TextTypeExtension extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', WysiwygType::class, options: [
                'required' => true,
                'label' => 'monsieurbiz_richeditor_plugin.ui_element.monsieurbiz.text.field.content',
                'constraints' => [
                    new Assert\NotBlank([]),
                ]
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [TextType::class];
    }
}

