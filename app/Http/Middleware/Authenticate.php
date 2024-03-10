<?php

namespace App\Http\Middleware;

use App\Domain\User\Models\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as BaseAuthenticate;

class Authenticate extends BaseAuthenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        if ($token = app('request')->headers->get('access_token')) {
            session()->put('access_token', $token);
        }

        if (resolve(User::class)->isGuest()) {
            $this->unauthenticated($request, $guards);
        }

        return $next($request);
    }
}
