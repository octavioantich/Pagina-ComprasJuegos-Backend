<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if ($user && in_array($user->userType, $roles)) {
            return $next($request);
        }

        return abort(404);
    }
}