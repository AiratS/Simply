<?php

declare(strict_types=1);

namespace App\Tests\Fixtures;

use App\ApiPlatform\Dto\ProfileOutputDto;

class ProfileOutputDtoFixture
{
    public static function get(): ProfileOutputDto
    {
        return (new ProfileOutputDto())
            ->setFullName('John Doe')
            ->setAbout('Super cool person!')
            ->setBackground('')
            ->setAvatar('')
        ;
    }
}
