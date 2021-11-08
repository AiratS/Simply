<?php

declare(strict_types=1);

namespace App\Enum;

abstract class AbstractEnum
{
    /**
     * @return string[]|int[]|float[]
     */
    abstract public static function getConsts(): array;
}
