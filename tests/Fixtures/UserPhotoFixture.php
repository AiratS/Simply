<?php

declare(strict_types=1);

namespace App\Tests\Fixtures;

use App\Entity\UserPhoto;
use Symfony\Component\HttpFoundation\File\File;

class UserPhotoFixture
{
    public static function get(): UserPhoto
    {
        return (new UserPhoto())
            ->setName('name')
            ->setSize(1024)
            ->setOriginalName('original_name')
            ->setMimeType('image/jpeg')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setFile(new File('/fake_path/fake_file_name', false))
        ;
    }
}
