<?php

declare(strict_types=1);

namespace App\ApiPlatform\Dto;

use App\Validator\ApiPlatform\Dto\SignUpInputDtoEqualPasswords;
use App\Validator\ApiPlatform\Dto\SignUpInputDtoUniqueEmail;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\GroupSequence({"SignUpInputDto", "Strict"})
 * @SignUpInputDtoEqualPasswords(groups={"Strict"})
 */
class SignUpInputDto
{
    /**
     * @Assert\Sequentially({
     *     @Assert\NotBlank(),
     *     @Assert\Email(),
     *     @SignUpInputDtoUniqueEmail()
     * })
     */
    private string $email;

    /**
     * @Assert\NotBlank()
     */
    private string $fullName;

    /**
     * @Assert\NotBlank()
     */
    private string $password;

    /**
     * @Assert\NotBlank()
     */
    public string $repeatPassword;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRepeatPassword(): string
    {
        return $this->repeatPassword;
    }

    public function setRepeatPassword(string $repeatPassword): self
    {
        $this->repeatPassword = $repeatPassword;

        return $this;
    }
}
