<?php

declare(strict_types=1);

namespace App\Tests\ApiPlatform\DataTransformer;

use App\ApiPlatform\DataTransformer\ProfileOutputDataTransformer;
use App\ApiPlatform\Dto\ProfileOutputDto;
use App\ApiPlatform\Dto\SignUpInputDto;
use App\Entity\User;
use App\Entity\UserPhoto;
use App\Tests\Fixtures\ProfileOutputDtoFixture;
use App\Tests\Fixtures\UserFixture;
use App\Tests\Fixtures\UserPhotoFixture;
use PHPUnit\Framework\TestCase;

class ProfileOutputDataTransformerTest extends TestCase
{
    private ProfileOutputDataTransformer $profileOutputDataTransformer;

    public function setUp(): void
    {
        $this->profileOutputDataTransformer = new ProfileOutputDataTransformer();
    }

    /**
     * @dataProvider provideSupportsTransformation
     *
     * @param array<string, mixed> $context
     */
    public function testSupportsTransformation(object|string $data, string $to, array $context, bool $expected): void
    {
        $this->assertEquals(
            $expected,
            $this->profileOutputDataTransformer->supportsTransformation($data, $to, $context)
        );
    }

    /**
     * @dataProvider provideValidTransform
     *
     * @param array<string, mixed> $context
     */
    public function testValidTransform(User $data, string $to, array $context, ProfileOutputDto $expected): void
    {
        $transformed = $this->profileOutputDataTransformer->transform($data, $to, $context);

        $this->assertEquals($expected->getFullName(), $transformed->getFullName());
        $this->assertEquals($expected->getAbout(), $transformed->getAbout());
    }

    /**
     * @dataProvider provideInvalidTransform
     *
     * @param array<string, mixed> $context
     */
    public function testInvalidTransform(mixed $data, string $to, array $context): void
    {
        $this->expectError();

        $this->profileOutputDataTransformer->transform($data, $to, $context);
    }

    /**
     * @return array<string, array>
     */
    public function provideSupportsTransformation(): array
    {
        return [
            'valid' => [
                'data' => new User(),
                'to' => ProfileOutputDto::class,
                'context' => [],
                'expected' => true,
            ],
            'invalid_data' => [
                'data' => new UserPhoto(),
                'to' => ProfileOutputDto::class,
                'context' => [],
                'expected' => false,
            ],
            'invalid_to' => [
                'data' => new User(),
                'to' => SignUpInputDto::class,
                'context' => [],
                'expected' => false,
            ],
            'invalid_data_and_to' => [
                'data' => new UserPhoto(),
                'to' => SignUpInputDto::class,
                'context' => [],
                'expected' => false,
            ],
            'invalid_non_object_data_and_to' => [
                'data' => 'non_object_data',
                'to' => SignUpInputDto::class,
                'context' => [],
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<string, array>
     */
    public function provideValidTransform(): array
    {
        return [
            'empty_to' => [
                'data' => UserFixture::get(),
                'to' => '',
                'context' => [],
                'expected' => ProfileOutputDtoFixture::get(),
            ],
            'filled_to' => [
                'data' => UserFixture::get(),
                'to' => 'filled_to',
                'context' => [],
                'expected' => ProfileOutputDtoFixture::get(),
            ],
        ];
    }

    /**
     * @return array<string, array>
     */
    public function provideInvalidTransform(): array
    {
        return [
            'null_data' => [
                'data' => null,
                'to' => '',
                'context' => [],
            ],
            'empty_string_data' => [
                'data' => '',
                'to' => '',
                'context' => [],
            ],
            'invalid_data_type' => [
                'data' => UserPhotoFixture::get(),
                'to' => '',
                'context' => [],
            ],
        ];
    }
}
