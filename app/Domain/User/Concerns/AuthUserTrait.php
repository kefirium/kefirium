<?php

namespace App\Domain\User\Concerns;

use App\Domain\Auth\Client\Data\UserResponse;
use App\Domain\Support\Jwt\JwtTokenBuilder;

trait AuthUserTrait
{
    protected ?int $id = null;
    protected string $login;
    protected ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    protected function fillDataForLogin(UserResponse $user): void
    {
        $this->id = $user->id;
        $this->login = $user->login;
        $this->email = $user->email;
    }

    protected function dataForTokenToArray(): array
    {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
        ];
    }

    protected function generateJwtToken(array $data): string
    {
        return JwtTokenBuilder::generateJWT($data);
    }

    public function isGuest(): bool
    {
        return is_null($this->id);
    }

    protected function decodeToken(string $accessToken): array
    {
        return JwtTokenBuilder::decodeToken($accessToken);
    }

    public function fillFromToken(string $accessToken): void
    {
        $data = $this->decodeToken($accessToken);

        $this->id = $data['id'];
        $this->login = $data['login'];
        $this->email = $data['email'] ?? '';
    }
}
