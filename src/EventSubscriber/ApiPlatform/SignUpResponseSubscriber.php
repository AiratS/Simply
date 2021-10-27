<?php

declare(strict_types=1);

namespace App\EventSubscriber\ApiPlatform;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Http\Authentication\AuthenticationSuccessHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

class SignUpResponseSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private SerializerInterface $serializer,
        private AuthenticationSuccessHandler $authenticationSuccess,
    ) {
    }

    /**
     * @return array<string, array>
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => ['addAuthenticationSuccessResponse', EventPriorities::POST_RESPOND],
        ];
    }

    /**
     * @throws JsonException
     */
    public function addAuthenticationSuccessResponse(ResponseEvent $event): void
    {
        $route = $event->getRequest()->get('_route');
        if ('api_users_sign_up_collection' !== $route) {
            return;
        }

        $originalResponse = $event->getResponse();
        if ($originalResponse->isSuccessful()) {
            $user = $this->getUser($originalResponse->getContent());
            $response = $this->authenticationSuccess->handleAuthenticationSuccess($user);
            $event->setResponse($response);
        }
    }

    /**
     * @throws JsonException
     */
    private function getUser(string|false $json): User
    {
        if (!$json) {
            throw new JsonException();
        }

        return $this->serializer->deserialize($json, User::class, JsonEncoder::FORMAT);
    }
}
