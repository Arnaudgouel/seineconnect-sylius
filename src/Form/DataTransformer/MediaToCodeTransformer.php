<?php
// src/Form/DataTransformer/IssueToNumberTransformer.php
namespace App\Form\DataTransformer;

use BitBag\SyliusCmsPlugin\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class MediaToCodeTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Transforms an object (media) to a string (code).
     *
     * @param  Media|null $media
     */
    public function reverseTransform($media): string
    {
        if (null === $media) {
            return '';
        }

        return $media->getCode();
    }

    /**
     * Transforms a string (code) to an object (media).
     *
     * @param  string $mediaCode
     * @throws TransformationFailedException if object (media) is not found.
     */
    public function transform($mediaCode): ?Media
    {
        // no media code? It's optional, so that's ok
        if (!$mediaCode) {
            return null;
        }

        $media = $this->entityManager
            ->getRepository(Media::class)
            // query for the media with this id
            ->findOneBy(['code' => $mediaCode])
        ;

        if (null === $media) {
            return null;
        }

        return $media;
    }
}
