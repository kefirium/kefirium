<?php

namespace App\Domain\Auth\Client\Data;

use App\Domain\Support\Apis\Dto\BaseRequestDto;

/**
 * @property string $login
 * @property string $password
 */
class GetUserByLoginPassRequest extends BaseRequestDto
{
    public function getBody(): mixed
    {
        return [
            'login' => $this->login,
            'password' => $this->password,
        ];
    }
}
