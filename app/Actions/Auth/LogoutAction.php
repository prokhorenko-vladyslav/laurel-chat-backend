<?php

namespace App\Actions\Auth;

use App\Abstracts\Action;
use App\DTO\Auth\CurrentUserDTO;
use Illuminate\Support\Facades\Auth;

class LogoutAction extends Action
{
    protected function handle(CurrentUserDTO $dto)
    {
        $user = $dto->getUser();
        $user->tokens()->delete();
        Auth::logout();
    }
}
