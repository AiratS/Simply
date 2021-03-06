<?php

declare(strict_types=1);

namespace App\ApiPlatform\Dto;

class ProfileOutputDto
{
    private int $id;

    private string $fullName;

    private ?string $about;

    private string $background;

    private string $avatar;

    private int $friendsCount = 2;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

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

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getBackground(): string
    {
        return $this->background;
    }

    public function setBackground(string $background): self
    {
        $this->background = $background;

        return $this;
    }

    public function getAvatar(): string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getFriendsCount(): int
    {
        return $this->friendsCount;
    }

    public function setFriendsCount(int $friendsCount): void
    {
        $this->friendsCount = $friendsCount;
    }
}
