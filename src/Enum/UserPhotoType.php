<?php

declare(strict_types=1);

namespace App\Enum;

class UserPhotoType extends AbstractEnum
{
    public const AVATAR = 'avatar';
    public const BACKGROUND = 'background';

    /**
     * @return string[]
     */
    public static function getConsts(): array
    {
        return [
            self::AVATAR,
            self::BACKGROUND,
        ];
    }
}
