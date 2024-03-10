<?php

namespace App\Domain\Support\Jwt;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtTokenBuilder
{
    public static function generateJWT(array $payload, ?string $kid = null, ?array $head = null): string
    {
        return JWT::encode($payload, config('jwt.key'), config('jwt.alg'), $kid, $head);
    }

    public static function decodeToken(string $token): array
    {
        return (array)JWT::decode($token, new Key(config('jwt.key'), config('jwt.alg')));
    }
}
