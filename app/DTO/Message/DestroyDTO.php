<?php

namespace App\DTO\Message;

use App\Abstracts\DTO;
use App\Models\Message;

class DestroyDTO extends DTO
{
    protected Message $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function getMessage(): Message
    {
        return $this->message;
    }
}
