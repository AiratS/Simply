<?php

declare(strict_types=1);

namespace App\Tests\Fixtures;

use App\Entity\User;

class UserFixture
{
    public static function get(): User
    {
        return (new User())
            ->setId(1)
            ->setEmail('john.doe@mail.com')
            ->setFullName('John Doe')
            ->setAbout('Super cool person!')
        ;
    }
}
