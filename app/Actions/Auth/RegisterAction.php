<?php

namespace App\Actions\Auth;

use App\Abstracts\Action;
use App\DTO\Auth\RegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterAction extends Action
{
    protected function handle(RegisterDTO $dto): string
    {
        $user = new User;
        $user->name = $dto->getName();
        $user->email = $dto->getEmail();
        $user->password = $dto->getPassword();

        $user->saveOrFail();
        Auth::login($user);
        return $user->generateToken();
    }
}
