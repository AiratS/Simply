<?php

declare(strict_types=1);

namespace App\ApiPlatform\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class LoginDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    private const OWN_PROFILE = -1;

    public function __construct(
        private TokenStorageInterface $tokenStorage,
        private UserRepository $userRepository,
    ) {
    }

    /**
     * @param int                  $id
     * @param array<string, mixed> $context
     */
    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?User
    {
        return self::OWN_PROFILE === $id
            ? $this->tokenStorage->getToken()->getUser()
            : $this->userRepository->find($id);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return User::class === $resourceClass;
    }
}
