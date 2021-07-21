<?php

namespace App\DTO\Chat\Member;

use App\Abstracts\DTO;
use App\Models\Chat;
use App\Models\User;

class LeaveDTO extends DTO
{
    protected Chat $chat;
    protected User $user;

    public function __construct(Chat $chat, User $user)
    {
        $this->chat = $chat;
        $this->user = $user;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
