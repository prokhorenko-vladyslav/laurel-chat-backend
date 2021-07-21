<?php

namespace App\Actions\Auth;

use App\Abstracts\Action;
use App\DTO\Auth\CurrentUserDTO;
use App\Models\User;

class CurrentUserAction extends Action
{
    protected function handle(CurrentUserDTO $dto): User
    {
        return $dto->getUser();
    }
}
