<?php

namespace App\Form\Extension;

use BitBag\SyliusCmsPlugin\Form\Type\WysiwygType;
use MonsieurBiz\SyliusMenuPlugin\Entity\Menu;
use Sylius\Bundle\ChannelBundle\Form\Type\ChannelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\UiElement\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType as TextField;

final class ChannelTypeExtension extends AbstractTypeExtension
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isRelatedToCustomMenu', CheckboxType::class, options: [
                'required' => false,
            ])
            ->add('headerMenu', EntityType::class, options: [
                'required' => false,
                'class' => Menu::class,
                'choice_label' => 'code',

            ])
            ->add('footerMenu', EntityType::class, options: [
                'required' => false,
                'class' => Menu::class,
                'choice_label' => 'code',

            ])
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [ChannelType::class];
    }
}

