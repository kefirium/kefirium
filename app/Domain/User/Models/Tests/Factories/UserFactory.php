<?php

namespace App\Domain\User\Models\Tests\Factories;

use App\Domain\Support\Jwt\JwtTokenBuilder;
use App\Domain\User\Models\User;
use Ensi\TestFactories\Factory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'login' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
        ];
    }

    public function make(array $extra = []): User
    {
        resolve(User::class)->fillFromToken($this->generateToken());

        return resolve(User::class);
    }

    private function generateToken(array $extra = []): string
    {
        return JwtTokenBuilder::generateJWT($this->makeArray($extra));
    }
}
