<?php

declare(strict_types=1);

namespace App\ApiPlatform\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\ApiPlatform\Dto\ProfileOutputDto;
use App\Entity\User;

class ProfileOutputDataTransformer implements DataTransformerInterface
{
    /**
     * @param object               $data
     * @param array<string, mixed> $context
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof User && ProfileOutputDto::class === $to;
    }

    /**
     * @param User                 $object
     * @param array<string, mixed> $context
     */
    public function transform($object, string $to, array $context = []): ProfileOutputDto
    {
        return (new ProfileOutputDto())
            ->setId($object->getId())
            ->setFullName($object->getFullName())
            ->setAbout($object->getAbout())
            ->setBackground('')
            ->setAvatar('')
        ;
    }
}
