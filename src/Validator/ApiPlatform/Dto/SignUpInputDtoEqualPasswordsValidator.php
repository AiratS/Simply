<?php

declare(strict_types=1);

namespace App\Validator\ApiPlatform\Dto;

use App\ApiPlatform\Dto\SignUpInputDto;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SignUpInputDtoEqualPasswordsValidator extends ConstraintValidator
{
    /**
     * @param SignUpInputDtoEqualPasswords $constraint
     */
    public function validate($value, Constraint $constraint): void
    {
        if (!$value instanceof SignUpInputDto) {
            return;
        }

        if (!$value->getRepeatPassword() || !$value->getPassword()) {
            return;
        }

        if ($value->getRepeatPassword() !== $value->getPassword()) {
            $this->context->buildViolation($constraint->message)
                ->atPath('repeatPassword')
                ->addViolation()
            ;
        }
    }
}
