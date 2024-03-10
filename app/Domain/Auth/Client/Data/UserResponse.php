<?php

namespace App\Domain\Auth\Client\Data;

use Illuminate\Support\Fluent;

/**
 * @property int $id
 * @property string $login
 * @property string $email
 */
class UserResponse extends Fluent
{
    public function __construct($attributes = [])
    {
        parent::__construct($attributes['data']);
    }
}
