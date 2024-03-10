<?php

namespace App\Http\ApiV1\Modules\Auth\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class LoginRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'login' => ['required'],
            'password' => ['required'],
        ];
    }
}
