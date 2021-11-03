<?php

declare(strict_types=1);

namespace App\ApiPlatform\Dto;

class ProfileOutputDto
{
    private string $fullName;

    private ?string $about;

    private string $background;

    private string $avatar;

    private int $friendsCount = 2;

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

    /**
     * @return int
     */
    public function getFriendsCount(): int
    {
        return $this->friendsCount;
    }

    /**
     * @param int $friendsCount
     */
    public function setFriendsCount(int $friendsCount): void
    {
        $this->friendsCount = $friendsCount;
    }
}
