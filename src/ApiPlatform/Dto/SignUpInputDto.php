<?php

declare(strict_types=1);

namespace App\ApiPlatform\Dto;

use App\Validator\ApiPlatform\Dto\SignUpInputDtoEqualPasswords;
use App\Validator\ApiPlatform\Dto\SignUpInputDtoUniqueEmail;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\GroupSequence({"SignUpInputDto", "Strict"})
 * @SignUpInputDtoEqualPasswords(groups={"Strict"})
 */
class SignUpInputDto
{
    /**
     * @Groups({"sign_up"})
     * @Assert\Sequentially({
     *     @Assert\NotBlank(),
     *     @Assert\Email(),
     *     @SignUpInputDtoUniqueEmail()
     * })
     */
    private string $email;

    /**
     * @Groups({"sign_up"})
     * @Assert\NotBlank()
     */
    private string $fullName;

    /**
     * @Groups({"sign_up"})
     * @Assert\NotBlank()
     */
    private string $password;

    /**
     * @Groups({"sign_up"})
     * @Assert\NotBlank()
     */
    public string $repeatPassword;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRepeatPassword(): string
    {
        return $this->repeatPassword;
    }

    public function setRepeatPassword(string $repeatPassword): void
    {
        $this->repeatPassword = $repeatPassword;
    }
}
