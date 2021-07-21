<?php

namespace App\Actions\Message;

use App\Abstracts\Action;
use App\DTO\Message\DestroyDTO;

class DestroyAction extends Action
{
    protected function handle(DestroyDTO $dto)
    {
        $dto->getMessage()->delete();
    }
}
