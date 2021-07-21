<?php

namespace App\DTO\Auth;

use App\Abstracts\DTO;
use App\Models\User;

class CurrentUserDTO extends DTO
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
