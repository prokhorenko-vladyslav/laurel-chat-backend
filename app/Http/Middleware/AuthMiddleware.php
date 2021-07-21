<?php

namespace App\Http\Middleware;

use App\Models\Token;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $this->authByToken($request->bearerToken());
        return $next($request);
    }

    protected function authByToken(?string $token)
    {
        $userId = Token::query()->where('token', $token)->first([ 'user_id' ]);
        if (!$userId) {
            throw new AuthenticationException();
        }

        Auth::loginUsingId($userId->user_id);
    }
}
