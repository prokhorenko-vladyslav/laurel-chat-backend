<?php

namespace App\Http\Controllers;

use App\Actions\Chat\Member\JoinAction;
use App\Actions\Chat\Member\LeaveAction;
use App\Http\Requests\Chat\Member\JoinRequest;
use App\Http\Requests\Chat\Member\LeaveRequest;
use App\Models\Chat;
use App\Models\User;

class ChatMemberController extends Controller
{
    public function join(JoinRequest $request, Chat $chat, User $user, JoinAction $action)
    {
        abort_if(!$chat->isOwner(User::currentId()), 403, 'You are not owner of this chat');
        abort_if($chat->isMember($user->id), 200, 'User is member already');

        $action->run(
            $request->getDTO()
        );
    }

    public function leave(LeaveRequest $request, Chat $chat, User $user, LeaveAction $action)
    {
        abort_if(!$chat->isMember($user->id), 403, 'User is not member of this chat');
        abort_if(
            User::currentId() !== $user->id && !$chat->isOwner(User::currentId()),
            403, 'You are not owner of this chat'
        );

        $action->run(
            $request->getDTO()
        );
    }
}
