<?php

namespace App\Domain\Auth\Tests\Factories;

use App\Domain\Support\Jwt\JwtTokenBuilder;
use Ensi\TestFactories\Factory;

class TokenFactory extends Factory
{
    protected function definition(): array
    {
        return [
            'access_token' => $this->generateToken()
        ];
    }

    public function make(array $extra = []): array
    {
        return $this->makeArray($extra);
    }

    private function generateToken(array $extra = []): string
    {
        return JwtTokenBuilder::generateJWT($extra);
    }
}
