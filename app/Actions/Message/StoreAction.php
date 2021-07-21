<?php

namespace App\Actions\Message;

use App\Abstracts\Action;
use App\DTO\Message\StoreDTO;
use App\Models\Message;

class StoreAction extends Action
{
    protected function handle(StoreDTO $dto)
    {
        $message = new Message;
        $message->text = $dto->getText();
        $message->user()->associate($dto->getOwner());
        $message->chat()->associate($dto->getChat());
        $message->saveOrFail();
    }
}
