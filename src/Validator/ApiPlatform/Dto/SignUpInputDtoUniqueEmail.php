<?php

declare(strict_types=1);

namespace App\Validator\ApiPlatform\Dto;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SignUpInputDtoUniqueEmail extends Constraint
{
    public string $message = 'The email has to by unique';

    public function getTargets(): string
    {
        return self::PROPERTY_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return SignUpInputDtoUniqueEmailValidator::class;
    }
}
