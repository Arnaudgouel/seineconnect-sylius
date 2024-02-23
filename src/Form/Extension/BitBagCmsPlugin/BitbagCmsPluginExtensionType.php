<?php

namespace App\Form\Extension\BitBagCmsPlugin;

use BitBag\SyliusCmsPlugin\Form\Type\Translation\PageTranslationType;
use MonsieurBiz\SyliusRichEditorPlugin\Form\Type\RichEditorType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BitbagCmsPluginExtensionType extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('content', RichEditorType::class, [
                'label' => 'sylius.ui.content',
                'required' => false,
            ])
            ->remove('breadcrumb')
            ->remove('nameWhenLinked')
            ->remove('descriptionWhenLinked')
            ->remove('title')
        ;
    }

    public static function getExtendedTypes(): iterable
    {
        return [PageTranslationType::class];
    }
}
