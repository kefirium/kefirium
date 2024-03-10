<?php

namespace App\Http\ApiV1\Modules\Auth\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;
use Illuminate\Http\Request;

class AuthResponse extends BaseJsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this['token'],
        ];
    }
}
