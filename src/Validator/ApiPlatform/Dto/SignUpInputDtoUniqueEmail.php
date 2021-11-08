<?php

declare(strict_types=1);

namespace App\Validator\ApiPlatform\Dto;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SignUpInputDtoUniqueEmail extends Constraint
{
    public string $message = 'validator.api_platform.dto.sign_up_input_dto_unique_email.message';

    public function getTargets(): string
    {
        return self::PROPERTY_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return SignUpInputDtoUniqueEmailValidator::class;
    }
}
