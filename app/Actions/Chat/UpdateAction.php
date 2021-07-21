<?php

namespace App\Actions\Chat;

use App\Abstracts\Action;
use App\DTO\Chat\UpdateDTO;

class UpdateAction extends Action
{
    protected function handle(UpdateDTO $dto)
    {
        $chat = $dto->getChat();
        $chat->name = $dto->getName();
        $chat->saveOrFail();

        $chat->members()->sync($dto->getMembers());
    }
}
