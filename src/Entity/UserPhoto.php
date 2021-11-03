<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\Api\UploadUserPhotoController;
use App\Repository\UserPhotoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource(
 *     iri="http://schema.org/UserPhoto",
 *     itemOperations={"get"},
 *     collectionOperations={
 *         "get",
 *         "post"={
 *             "path"="/profile-upload-photo",
 *             "controller"=UploadUserPhotoController::class,
 *             "deserialize"=false,
 *             "openapi_context"={
 *                  "summary"="Uploads user photo",
 *                  "requestBody"={
 *                      "content"={
 *                          "multipart/form-data"={
 *                              "schema"={
 *                                  "type"="object",
 *                                  "properties"={
 *                                      "photo"={
 *                                          "type"="string",
 *                                          "format"="binary"
 *                                      },
 *                                      "type"={
 *                                          "type"="string"
 *                                      }
 *                                  }
 *                              }
 *                          }
 *                      }
 *                  }
 *              }
 *         }
 *     }
 * )
 * @Vich\Uploadable()
 * @ORM\Entity(repositoryClass=UserPhotoRepository::class)
 */
class UserPhoto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer")
     */
    private int $size;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $originalName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $mimeType;

    /**
     * @Assert\Choice(callback={"App\Enum\UserPhotoType", "getConsts"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $type;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="photos")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?User $userEntity;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $createdAt;

    /**
     * @Assert\File(maxSize="2M")
     * @Assert\Image()
     * @Vich\UploadableField(mapping="user_photo", fileNameProperty="name", originalName="originalName", mimeType="mimeType", size="size")
     */
    private ?File $file;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getOriginalName(): ?string
    {
        return $this->originalName;
    }

    public function setOriginalName(string $originalName): self
    {
        $this->originalName = $originalName;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getUserEntity(): ?User
    {
        return $this->userEntity;
    }

    public function setUserEntity(?User $userEntity): self
    {
        $this->userEntity = $userEntity;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function setFile(?File $file = null): self
    {
        $this->file = $file;
        if (null !== $file) {
            $this->createdAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }
}
