<?php

namespace App\Actions\Chat;

use App\Abstracts\Action;
use App\DTO\Chat\DestroyDTO;

class DestroyAction extends Action
{
    protected function handle(DestroyDTO $dto)
    {
        $dto->getChat()->messages()->delete();
        $dto->getChat()->delete();
    }
}
