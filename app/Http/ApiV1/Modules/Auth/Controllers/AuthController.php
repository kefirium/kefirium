<?php

namespace App\Http\ApiV1\Modules\Auth\Controllers;

use App\Domain\Auth\Actions\AuthUserAction;
use App\Http\ApiV1\Modules\Auth\Requests\LoginRequest;
use App\Http\ApiV1\Modules\Auth\Resources\AuthResponse;
use Illuminate\Http\JsonResponse;

class AuthController
{
    public function login(LoginRequest $request, AuthUserAction $action): AuthResponse
    {
        return new AuthResponse($action->execute($request->validated()));
    }

    public function home(): JsonResponse
    {
        return response()->json([
            'home page'
        ]);
    }
}
