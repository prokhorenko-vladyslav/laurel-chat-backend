<?php

namespace App\Actions\Chat\Member;

use App\Abstracts\Action;
use App\DTO\Chat\Member\JoinDTO;

class JoinAction extends Action
{
    protected function handle(JoinDTO $dto)
    {
        $dto->getChat()
            ->members()
            ->attach(
                $dto->getUser()->id
            );
    }
}
