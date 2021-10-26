<?php

declare(strict_types=1);

namespace App\Validator\ApiPlatform\Dto;

use App\Repository\UserRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SignUpInputDtoUniqueEmailValidator extends ConstraintValidator
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @param SignUpInputDtoUniqueEmail $constraint
     */
    public function validate($value, Constraint $constraint): void
    {
        $user = $this->userRepository->findByEmail($value);

        if (null !== $user) {
            $this->context->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }
}
