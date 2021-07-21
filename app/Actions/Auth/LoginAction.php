<?php

namespace App\Actions\Auth;

use App\Abstracts\Action;
use App\DTO\Auth\LoginDTO;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAction extends Action
{
    protected function handle(LoginDTO $dto)
    {
        $user = User::query()->where('email', $dto->getEmail())->first();
        if (
            !$user ||
            !Hash::check($dto->getPassword(), $user->password)
        ) {
            throw new AuthenticationException('Email or password is invalid');
        }

        Auth::login($user);
        return $user->generateToken();
    }
}
