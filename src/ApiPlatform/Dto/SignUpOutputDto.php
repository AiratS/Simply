<?php

declare(strict_types=1);

namespace App\ApiPlatform\Dto;

class SignUpOutputDto
{
    private string $token;

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
