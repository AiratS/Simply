<?php

declare(strict_types=1);

namespace App\Validator\ApiPlatform\Dto;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SignUpInputDtoEqualPasswords extends Constraint
{
    public string $message = 'The repeat password must be same';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return SignUpInputDtoEqualPasswordsValidator::class;
    }
}
