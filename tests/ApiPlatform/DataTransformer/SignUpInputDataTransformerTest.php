<?php

declare(strict_types=1);

namespace App\Tests\ApiPlatform\DataTransformer;

use ApiPlatform\Core\Validator\Exception\ValidationException;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\ApiPlatform\DataTransformer\SignUpInputDataTransformer;
use App\ApiPlatform\Dto\SignUpInputDto;
use App\Entity\User;
use App\Entity\UserPhoto;
use App\Tests\Fixtures\SignUpInputDtoFixture;
use App\Tests\Fixtures\UserFixture;
use App\Traits\ClassShortNameTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SignUpInputDataTransformerTest extends KernelTestCase
{
    use ClassShortNameTrait;

    private ValidatorInterface $validator;
    private SignUpInputDataTransformer $signUpInputDataTransformer;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var UserPasswordHasherInterface $passwordHasher */
        $passwordHasher = $container->get(UserPasswordHasherInterface::class);
        $this->validator = $this->createMock(ValidatorInterface::class);

        $this->signUpInputDataTransformer = new SignUpInputDataTransformer(
            $this->validator,
            $passwordHasher
        );
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
            $this->signUpInputDataTransformer->supportsTransformation($data, $to, $context)
        );
    }

    /**
     * @dataProvider provideValidTransform
     *
     * @param array<string, mixed> $context
     */
    public function testValidTransform(SignUpInputDto $data, string $to, array $context, User $expected): void
    {
        $transformed = $this->signUpInputDataTransformer->transform($data, $to, $context);

        $this->assertEquals($expected->getEmail(), $transformed->getEmail());
        $this->assertEquals($expected->getFullName(), $transformed->getFullName());
    }

    /**
     * @dataProvider provideValidationExceptionSupportsTransformation
     *
     * @param array<string, mixed> $context
     */
    public function testValidationExceptionSupportsTransformation(SignUpInputDto $data, string $to, array $context): void
    {
        $this->validator
            ->method('validate')
            ->will($this->throwException(new ValidationException()))
        ;

        $this->expectException(ValidationException::class);
        $this->signUpInputDataTransformer->transform($data, $to, $context);
    }

    /**
     * @return array<string, array>
     */
    public function provideSupportsTransformation(): array
    {
        $context = $this->getContext();
        $invalidContext = [
            'input' => [
                'class' => null,
            ],
        ];

        return [
            'valid' => [
                'data' => SignUpInputDtoFixture::get(),
                'to' => User::class,
                'context' => $context,
                'expected' => true,
            ],
            'invalid_to' => [
                'data' => SignUpInputDtoFixture::get(),
                'to' => UserPhoto::class,
                'context' => $context,
                'expected' => false,
            ],
            'invalid_context' => [
                'data' => SignUpInputDtoFixture::get(),
                'to' => User::class,
                'context' => $invalidContext,
                'expected' => false,
            ],
            'invalid_to_and_invalid_context' => [
                'data' => SignUpInputDtoFixture::get(),
                'to' => UserPhoto::class,
                'context' => $invalidContext,
                'expected' => false,
            ],
        ];
    }

    /**
     * @return array<array>
     */
    public function provideValidTransform(): array
    {
        return [
            [
                'data' => SignUpInputDtoFixture::get()
                    ->setPassword('password')
                    ->setRepeatPassword('password'),
                'to' => User::class,
                'context' => $this->getContext(),
                'expected' => UserFixture::get(),
            ],
        ];
    }

    /**
     * @return array<array>
     */
    public function provideValidationExceptionSupportsTransformation(): array
    {
        return [
            [
                'data' => SignUpInputDtoFixture::get()
                    ->setEmail('incorrect.email')
                    ->setPassword('password')
                    ->setRepeatPassword('password_different'),
                'to' => User::class,
                'context' => $this->getContext(),
            ],
        ];
    }

    /**
     * @return array<string, array{class: string, name: string}>
     */
    private function getContext(): array
    {
        return [
            'input' => [
                'class' => SignUpInputDto::class,
                'name' => $this->getShortClassName(SignUpInputDto::class),
            ],
        ];
    }
}
