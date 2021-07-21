<?php

namespace App\DTO\Chat;

use App\Abstracts\DTO;
use App\Models\Chat;
use Illuminate\Support\Collection;

class UpdateDTO extends DTO
{
    protected Chat $chat;
    protected string $name;
    protected Collection $members;

    public function __construct(Chat $chat, string $name, array $members = [])
    {
        $members = collect($members);
        Chat::validateMembers($members);

        $this->chat = $chat;
        $this->name = $name;
        $this->members = $members;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getMembers(): Collection
    {
        return $this->members;
    }
}
