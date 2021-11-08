<?php

declare(strict_types=1);

namespace App\Tests\Fixtures;

use App\ApiPlatform\Dto\SignUpInputDto;

class SignUpInputDtoFixture
{
    public static function get(): SignUpInputDto
    {
        return (new SignUpInputDto())
            ->setEmail('john.doe@mail.com')
            ->setFullName('John Doe')
        ;
    }
}
