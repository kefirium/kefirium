<?php

namespace App\Domain\User\Models;

use App\Domain\Auth\Client\Data\UserResponse;
use App\Domain\User\Concerns\AuthUserTrait;
use App\Domain\User\Models\Tests\Factories\UserFactory;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class User implements Authenticatable
{
    use AuthUserTrait;

    public function __construct()
    {
        if ($token = Request::header('access-token')) {
            $this->fillFromToken($token);
        } elseif ($token = Session::get('access_token')) {
            $this->fillFromToken($token);
        }
    }

    public function login(UserResponse $userResponse): string
    {
        $this->fillDataForLogin($userResponse);
        $dataFortToken = $this->dataForTokenToArray();
        $dataFortToken['exp'] = Carbon::now()->addMinutes(30);

        $token = $this->generateJwtToken($dataFortToken);
        session()->put('access_token', $token);

        return $token;
    }

    public static function factory(): UserFactory
    {
        return UserFactory::new();
    }

    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
