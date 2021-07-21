<?php

namespace App\Actions\Message;

use App\Abstracts\Action;
use App\DTO\Message\UpdateDTO;

class UpdateAction extends Action
{
    protected function handle(UpdateDTO $dto)
    {
        $message = $dto->getMessage();
        $message->text = $dto->getText();
        $message->saveOrFail();
    }
}
