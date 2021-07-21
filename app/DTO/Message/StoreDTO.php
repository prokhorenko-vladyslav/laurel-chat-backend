<?php

namespace App\DTO\Message;

use App\Abstracts\DTO;

class StoreDTO extends DTO
{
    protected string $text;
    protected int $chat;
    protected int $owner;

    public function __construct(string $text, int $chat, int $owner)
    {
        $this->text = $text;
        $this->chat = $chat;
        $this->owner = $owner;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getChat(): int
    {
        return $this->chat;
    }

    public function getOwner(): int
    {
        return $this->owner;
    }
}
