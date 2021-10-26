<?php

declare(strict_types=1);

namespace App\ApiPlatform\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\ApiPlatform\Dto\SignUpOutputDto;
use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class SignUpOutputDataTransformer implements DataTransformerInterface
{
    public function __construct(
        private JWTTokenManagerInterface $tokenManager,
        private AuthenticationSuccessHandler $authenticationSuccess,
    ) {
    }

    /**
     * @param User                 $object
     * @param array<string, mixed> $context
     */
    public function transform($object, string $to, array $context = []): SignUpOutputDto
    {
        $token = $this->tokenManager->create($object);
        $this->authenticationSuccess->handleAuthenticationSuccess($object, $token);

        return (new SignUpOutputDto())
            ->setToken($token)
        ;
    }

    /**
     * @param object               $data
     * @param array<string, mixed> $context
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return $data instanceof User && SignUpOutputDto::class === $to;
    }
}
