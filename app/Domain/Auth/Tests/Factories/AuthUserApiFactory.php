<?php

namespace App\Domain\Auth\Tests\Factories;

use App\Domain\Auth\Client\Data\UserResponse;
use Ensi\TestFactories\Factory;

class AuthUserApiFactory extends Factory
{
    protected function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(),
            'login' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
        ];
    }

    public function make(array $extra = []): array
    {
        return $this->makeArray($extra);
    }

    public function makeResponseOne(array $extra = []): UserResponse
    {
        return new UserResponse([
            'data' => $this->make($this->makeArray($extra)),
        ]);
    }
}
