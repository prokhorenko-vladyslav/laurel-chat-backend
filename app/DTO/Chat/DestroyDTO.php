<?php

namespace App\DTO\Chat;

use App\Abstracts\DTO;
use App\Models\Chat;

class DestroyDTO extends DTO
{
    protected Chat $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }
}
