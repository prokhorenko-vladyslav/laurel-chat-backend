<?php

namespace App\Actions\Chat\Member;

use App\Abstracts\Action;
use App\DTO\Chat\Member\LeaveDTO;

class LeaveAction extends Action
{
    protected function handle(LeaveDTO $dto)
    {
        $dto->getChat()
            ->members()
            ->detach(
                $dto->getUser()->id
            );
    }
}
