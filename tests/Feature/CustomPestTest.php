<?php

use App\Domain\Auth\Client\AuthApi;
use App\Domain\Auth\Tests\Factories\AuthUserApiFactory;
use App\Domain\Auth\Tests\Factories\TokenFactory;
use App\Domain\User\Models\User;
use function Pest\Laravel\postJson;

uses()->group('auth', 'component');

test('POST /api/v1/auth/login 200', function () {
    $this->mock(AuthApi::class)->allows([
        'getUser' => AuthUserApiFactory::new()->makeResponseOne()
    ]);

    $token = TokenFactory::new()->make()['access_token'];
    $this->mock(User::class)->allows([
        'login' => $token
    ]);

    $request = [
        'login' => 'example123',
        'password' => 'password123',
    ];

    postJson('/api/v1/auth/login', $request)
        ->assertOk()
        ->assertJsonStructure([
            'data' => ['access_token']
        ])
        ->assertJsonPath('data.access_token', $token);
});

test('POST /api/v1/auth/login  400 parameters login and password does not exist', function () {
    $this->mock(AuthApi::class)->allows([
        'getUser' => AuthUserApiFactory::new()->makeResponseOne()
    ]);

    $token = TokenFactory::new()->make()['access_token'];
    $this->mock(User::class)->allows([
        'login' => $token
    ]);

    postJson('/api/v1/auth/login')
        ->assertBadRequest();
});
