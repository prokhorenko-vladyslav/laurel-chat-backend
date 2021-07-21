<?php

namespace App\DTO\Message;

use App\Abstracts\DTO;
use App\Models\Message;

class UpdateDTO extends DTO
{
    protected Message $message;
    protected string $text;

    public function __construct(Message $message, string $text)
    {
        $this->message = $message;
        $this->text = $text;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
