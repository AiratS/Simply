<?php

declare(strict_types=1);

namespace App\ApiPlatform\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use ApiPlatform\Core\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\ApiPlatform\Dto\SignUpInputDto;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SignUpInputDataTransformer implements DataTransformerInterface
{
    public function __construct(
        private ValidatorInterface $validator,
        private UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    /**
     * @param SignUpInputDto       $object
     * @param array<string, mixed> $context
     *
     * @throws ValidationException
     */
    public function transform($object, string $to, array $context = []): User
    {
        $this->validator->validate($object);

        $user = (new User())
            ->setEmail($object->getEmail())
            ->setFullName($object->getFullName())
        ;

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $object->getPassword()
        );

        return $user->setPassword($hashedPassword);
    }

    /**
     * @param object               $data
     * @param array<string, mixed> $context
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        if ($data instanceof User) {
            return false;
        }

        return User::class === $to && null !== $context['input']['class'];
    }
}
