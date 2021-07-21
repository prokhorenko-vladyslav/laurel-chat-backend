<?php

namespace App\Actions\Chat;

use App\Abstracts\Action;
use App\DTO\Chat\StoreDTO;
use App\Models\Chat;

class StoreAction extends Action
{
    protected function handle(StoreDTO $dto)
    {
        $chat = new Chat;
        $chat->name = $dto->getName();
        $chat->owner()->associate($dto->getOwnerId());
        $chat->saveOrFail();

        $chat->members()->sync($dto->getMembers());
    }
}
