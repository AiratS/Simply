<?php

declare(strict_types=1);

namespace App\Traits;

trait ClassShortNameTrait
{
    public function getShortClassName(string $classWithNamespace): string
    {
        return basename(str_replace('\\', '/', $classWithNamespace));
    }
}
