<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\User;
use App\Entity\UserPhoto;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Contracts\Translation\TranslatorInterface;

#[AsController]
class UploadUserPhotoController extends AbstractController
{
    private const PHOTO_FIELD_KEY = 'photo';

    public function __construct(
        private TranslatorInterface $translator,
        private UserRepository $userRepository,
    ) {
    }

    /**
     * @throws BadRequestHttpException
     */
    public function __invoke(Request $request): UserPhoto
    {
        $file = $request->files->get(self::PHOTO_FIELD_KEY);
        if (null === $file) {
            $msg = $this->translator
                ->trans('controller.api.upload_user_photo_controller.invalid_file_key_specified');
            throw new BadRequestHttpException($msg);
        }

        /** @var User $user */
        $user = $this->getUser();

        return (new UserPhoto())
            ->setFile($file)
            ->setUserEntity($user)
            ->setType($request->get('type'))
        ;
    }
}
