<?php

namespace App\Domain\Auth\Actions;

use App\Domain\Auth\Client\AuthApi;
use App\Domain\Auth\Client\Data\GetUserByLoginPassRequest;
use App\Domain\User\Models\User;

class AuthUserAction
{
    public function __construct(
        readonly private AuthApi $authApi,
        readonly private User $user
    )
    {
    }

    public function execute(array $fields): array
    {
        $userRequest = new GetUserByLoginPassRequest($fields);
        $loginResponse = $this->authApi->getUser($userRequest);

        return [
            'token' => $this->user->login($loginResponse)
        ];
    }
}
