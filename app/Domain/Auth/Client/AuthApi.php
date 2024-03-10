<?php

namespace App\Domain\Auth\Client;

use App\Domain\Auth\Client\Data\GetUserByLoginPassRequest;
use App\Domain\Auth\Client\Data\UserResponse;
use App\Domain\Support\Apis\BaseApi;
use App\Domain\Support\Apis\RequestBuilder;

class AuthApi extends BaseApi
{
    private const URL_PREFIX = '/api/v1';

    public function getUser(GetUserByLoginPassRequest $request): UserResponse
    {
        return $this->send(
            $this->getUserRequestBuilder($request), fn($content) => new UserResponse($content)
        );
    }

    protected function getUserRequestBuilder(GetUserByLoginPassRequest $request): RequestBuilder
    {
        return (new RequestBuilder(self::URL_PREFIX . '/user:get-by-password', 'POST'))
            ->json($request);
    }
}
