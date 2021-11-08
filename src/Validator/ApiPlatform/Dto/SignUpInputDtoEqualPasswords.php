<?php

declare(strict_types=1);

namespace App\Validator\ApiPlatform\Dto;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SignUpInputDtoEqualPasswords extends Constraint
{
    public string $message = 'validator.api_platform.dto.sign_up_input_dto_equal_passwords.message';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return SignUpInputDtoEqualPasswordsValidator::class;
    }
}
